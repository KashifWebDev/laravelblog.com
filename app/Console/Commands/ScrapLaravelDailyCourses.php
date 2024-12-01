<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class ScrapLaravelDailyCourses extends Command
{
    protected $signature = 'app:scrap-laravel-daily-courses';
    protected $description = 'Scrap Laravel Daily Courses';

    public function handle()
    {
        Log::info('[->] Scrap Laravel Courses was just ran');

        $listingUrl = 'https://laraveldaily.com/courses';
        $cookies = env("LARAVELDAILY_COOKIE");

        try {
            $client = new Client([
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
                    'Cookie' => $cookies,
                ],
                'verify' => false,
            ]);

            // Step 2: Fetch the listing page HTML
            $response = $client->get($listingUrl);
            $html = $response->getBody()->getContents();

            $crawler = new Crawler($html);

//            $crawler->filterXPath('/html/body/main/div/ul[1]')->each(function (Crawler $node) {
//                $link = $node->filter('a')->attr('href');
//                $img = $node->filter('a img')->attr('src');
//                Log::info('Article Link: ' . $link);
//                Log::info('Img: ' . $img);
//            });

            $data = [];
            $crawler->filter('body>main>div.container>ul>li')->each(function (Crawler $link) use(&$data) {
                    Log::info('title:  '. $link->filter('header>h2>a')->text());
                    Log::info('href:  '. $link->filter('header>h2>a')->attr('href'));
                    Log::info('anchor:  '. $link->text());
                    Log::info('img:  '. $link->filter('a>img')->attr('src'));
                    Log::info('words  :  '. $link->filter('header>ul>li:nth-child(2)>span')->text());
            });


        } catch (RequestException $e) {
            Log::error('Error while scraping: ' . $e->getMessage());
            return 'Error: ' . $e->getMessage();
        }
    }
}
