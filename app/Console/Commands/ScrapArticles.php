<?php

namespace App\Console\Commands;

use App\Jobs\ScrapArticle;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class ScrapArticles extends Command
{
    protected $signature = 'app:scrap-articles';
    protected $description = 'Scrape article links from the articles listing page and then extract each article content';

    public function handle()
    {
        Log::info('ScrapArticel was just ran!');
        // Step 1: URL of the page that lists all articles
        $listingUrl = 'https://laraveldaily.com/tag/premium-tutorials'; // Replace with the URL of the articles listing page
        $cookies = config("app.cookies.laraveldaily");
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

            // Step 3: Parse the HTML and extract article links
            $crawler = new Crawler($html);

            $links = array();
            // Assuming each article link is inside an <a> tag with a class like 'article-link' or within a <div> tag
            $crawler->filter('li.grid a')->each(function (Crawler $node) use($links) {
                $link = $node->attr('href');
                Log::info('Article Link: ' . $link);
                ScrapArticle::dispatch($link);
            });

            // Extract the href of each article link
//            $articleLinks = [];
//            foreach ($links as $link) {
//                $articleLinks[] = $link->getUri();
//            }
//
//            Log::info('Article links found:', $articleLinks);
//
//            // Step 4: Now, for each article link, fetch the content and log it
//            foreach ($articleLinks as $url) {
//                $this->scrapeArticleContent($url, $client);
//            }

        } catch (RequestException $e) {
            Log::error('Error while scraping: ' . $e->getMessage());
            return 'Error: ' . $e->getMessage();
        }
    }
}
