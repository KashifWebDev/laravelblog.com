<?php
namespace App\Jobs;

use App\Models\Article;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;

class ScrapArticle
{
    use Dispatchable, Queueable, SerializesModels;

    protected $url;

    // Constructor to accept the URL when job is dispatched
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("Scrap article job started for ".$this->url);
        $url = $this->url;  // Get the URL passed when the job is dispatched

        $slug = Str::replaceFirst('https://laraveldaily.com/post/', '', $url);

        if (Article::where('slug', $slug)->exists()) {
            Log::info("Article with slug {$slug} already exists. Skipping scraping.");
            return; // Early return to skip scraping
        }

        $cookies = env("LARAVELDAILY_COOKIE");

        try {
            $client = new Client([
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
                    'Cookie' => $cookies,
                ],
                'verify' => false,
            ]);

            $response = $client->get($url);
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);

            $dateText = $crawler->filter('time')->text();
            $date = trim(explode('·', $dateText)[0]); // Get only the date part
            $createdAt = Carbon::createFromFormat('F d, Y', $date)->format('Y-m-d H:i:s');


            $ogImage = $crawler->filter('meta[property="og:image"]')->attr('content');

            // Download the OG image and store it locally
            $imagePath = null;
            if ($ogImage) {
                // Generate a unique file name
                $imageName = basename($ogImage);

                // Store the image in the storage folder
                $imageData = $client->get($ogImage)->getBody();
                // Store the image in the public storage folder (accessible publicly)
                $imagePath = 'articles/' . uniqid() . '-' . $imageName;

                // Store the image in the public directory
                $imageData = $client->get($ogImage)->getBody();
                Storage::disk('public')->put($imagePath, $imageData);
            }

            // Extract the time (duration and word count)
            $timeText = $crawler->filter('time')->text();

            // Split the timeText to get duration and word count
            preg_match('/(\d+ mins), (\d+ words)/', $timeText, $matches);
            $duration = $matches[1] ?? null; // e.g., "21 mins"
            $wordCount = $matches[2] ?? null; // e.g., "4103 words"

            // Extract heading and content
            $heading = $crawler->filter('h1')->text();
            $content = $crawler->filter('article')->html();


            // Save article to database
            Article::create([
                'title' => $heading,
                'content' => $content,
                'slug' => $slug,
                'image' => $imagePath, // Store the local image path
                'duration' => $duration,
                'word_count' => $wordCount,
                'source' => 'https://laraveldaily.com/',
                'created_at' => $createdAt // Save the date here
            ]);

            \Log::info(' ========== Created date is '. $createdAt.' =================');

        } catch (RequestException $e) {
            Log::error('Error scraping article: ' . $e->getMessage());
        }
    }
}
