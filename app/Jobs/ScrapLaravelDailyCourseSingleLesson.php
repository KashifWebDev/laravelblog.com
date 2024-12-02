<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\Lesson;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ScrapLaravelDailyCourseSingleLesson implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $lessonID, public string $url)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Log::info("[+] Scrap lesson text content for ".$this->url);

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

            $content = $crawler->filter('article')->html();

            Lesson::whereId($this->lessonID)->update(['content' => $content]);

        } catch (RequestException $e) {
            Log::error('Error scraping article: ' . $e->getMessage());
        }
    }
}
