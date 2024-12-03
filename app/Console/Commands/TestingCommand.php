<?php

namespace App\Console\Commands;

use App\Models\Lesson;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class TestingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testing-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $cookies = config("app.cookies.laraveldaily");

        if (empty($cookies)) {
            Log::error('LARAVELDAILY_COOKIE is not set or empty.');
            return;
        }

        try {
            $client = new Client([
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0',
                    'Cookie' => $cookies,
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Accept-Language' => 'en-US,en;q=0.5',
                ],
                'verify' => false,
            ]);

            $response = $client->get('https://laraveldaily.com/lesson/testing-laravel/23-team-management');
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);

            if ($crawler->filter('article')->count() > 0) {
                $content = $crawler->filter('article')->html();
            }else{
                $src = $crawler->filter('#player')->attr('src');
                $content = '<iframe src="'.$src.'" width="640"
                            height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
            }
            Log::info($content);


            echo "Lesson was fetched successfully.";

        } catch (RequestException $e) {
            Log::error('Error scraping article: ' . $e->getMessage());
        }
    }
}
