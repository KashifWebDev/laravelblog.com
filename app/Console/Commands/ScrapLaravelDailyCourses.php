<?php

namespace App\Console\Commands;

use App\Jobs\ScrapLaravelDailyCourseLessons;
use App\Models\Course;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ScrapLaravelDailyCourses extends Command
{
    protected $signature = 'app:scrap-laravel-daily-courses';
    protected $description = 'Scrap Laravel Daily Courses';

    public function handle()
    {
        Log::info('[->] Scrap Laravel Courses was just ran');

        $listingUrl = 'https://laraveldaily.com/courses';
        $cookies = config("app.cookies.laraveldaily");

        try {
            $client = new Client([
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
                    'Cookie' => $cookies,
                ],
                'verify' => false,
            ]);

            $response = $client->get($listingUrl);
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);

//            $crawler->filterXPath('/html/body/main/div/ul[1]')->each(function (Crawler $node) {
//                $link = $node->filter('a')->attr('href');
//                $img = $node->filter('a img')->attr('src');
//                Log::info('Article Link: ' . $link);
//                Log::info('Img: ' . $img);
//            });

            $courses = [];
            $crawler->filter('body>main>div.container>ul>li')->each(function (Crawler $link) use(&$courses) {
                 $courses[] = $link->filter('header>h2>a')->attr('href');
            });

            foreach ($courses as $course) {
                $slug = Str::replaceFirst('https://laraveldaily.com/course/', '', $course);

                if (Course::where('slug', $slug)->exists()) {
                    Log::info("[-] Course with slug {$slug} already exists. Skipping scraping.");
                    continue; // Early return to skip scraping
                }


                $response = $client->get($course);
                $html = $response->getBody()->getContents();
                $crawler = new Crawler($html);
                $title = $crawler->filter('h1')->text();
                $words = $crawler->filter('header>ul>li:nth-child(2)>span')->text();
                $publishedAt = $crawler->filter('header>ul>li:nth-child(3)>time')->text();
                $tags = $crawler->filter('header>ul>li:nth-child(4)>time')->text();
                $content = $crawler->filter('article')->html();
                $ogImage = $crawler->filter('meta[name="twitter:image"]')->attr('content');

                // Download the OG image and store it locally
                $imagePath = null;
                if ($ogImage) {
                    // Generate a unique file name
                    $imageName = basename($ogImage);

                    // Store the image in the storage folder
                    $imageData = $client->get($ogImage)->getBody();
                    // Store the image in the public storage folder (accessible publicly)
                    $imagePath = 'courses/'.$imageName.'-'.uniqid().'.jpg';

                    // Store the image in the public directory
                    $imageData = $client->get($ogImage)->getBody();
                    Storage::disk('public')->put($imagePath, $imageData);
                }

                $createdCourse = Course::create([
                    'slug' => $slug,
                    'name' => $title,
                    'words' => (int) str_replace(' words', '', $words),
                    'published_at' => $publishedAt,
                    'tags' => $tags,
                    'content' => $content,
                    'image' => $imagePath,
                ]);
                dispatch(new ScrapLaravelDailyCourseLessons($course, $createdCourse->id));
            }



        } catch (RequestException $e) {
            Log::error('Error while scraping: ' . $e->getMessage());
            return 'Error: ' . $e->getMessage();
        }
    }
}
