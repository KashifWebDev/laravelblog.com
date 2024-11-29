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
        // Step 1: URL of the page that lists all articles
        $listingUrl = 'https://laraveldaily.com/tag/premium-tutorials'; // Replace with the URL of the articles listing page
        $cookies = '_pk_id.1.fab2=ffcd9046582e3056.1720956058.; _gid=GA1.2.316436569.1732862876; remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d=eyJpdiI6Ill3eUNzM3R0RlF0RzRFMU93VU5MbHc9PSIsInZhbHVlIjoiZytwRkVVSU03dXdEL3p1aDJ1NUJsaXN6QnduNklubE5sUStieDV5cy9vNkZxc0czakJwNjZHdUdyODVrZzYxMXhneFB3OGh2a05Sb3RQQStMOXRoOVc5N3JyYlNuZHErY1N3NlcxYm05OTl1bHJwaWZFeTBzcExueks4UzNndlRNK2JIUnJxMTR4VUhINlRlNDkwaGwzTUcwU1puQlcrL2JNQ3R5WkxRVGVUWHdEM3dKWVRsWndwYUNJcHNFQzJQeE93eG5OYlptWmhuZStZRUg4aGlxZnNWc1ZYSWZZTDYvVWtXRm53ZGxmdz0iLCJtYWMiOiJmOGMyOTAxMGM4ZTY3MWIxNjRhZmNjYjdlNWU1Mzc5MGQ5ZmQ1NmQ3MjkyN2M4M2Q5NGI4NTc2NTRhMjI5ODBkIiwidGFnIjoiIn0%3D; _pk_ref.1.fab2=%5B%22%22%2C%22%22%2C1732894786%2C%22https%3A%2F%2Fwww.linkedin.com%2F%22%5D; _pk_ses.1.fab2=1; XSRF-TOKEN=eyJpdiI6IkhiTUdtcjIwR0pjN0pVRTlUTGRJZXc9PSIsInZhbHVlIjoiYk84UFlIWmlxdGNybll5L0xsOUZWTzlPNkpxRERLdVE3UWhQUU1uMGM0cUEyNXFld2V5QU84TCthV2I2VDcyMGVod1VsQ1lWOUFDRzA3c21KazFxcHBKOHhkOEoyYTJaMmlrMjNHNGk1bllWK1Vudlh4Smt3RFhDNTZNeWhCZGgiLCJtYWMiOiJkZDBhZDFlZTRiYmQ0MGIzYTkzNDRlYjIzNzc1MWQ1NDI4OTJlNmE0MzE2YTA2NWRlZGFmYWU4NDYwZjI2NGMyIiwidGFnIjoiIn0%3D; laravel_daily_session=eyJpdiI6Ii9oK0d4UjdTZVAyZWNwc3ZSYU9GdlE9PSIsInZhbHVlIjoiRVRXQVA5YndZeUNxcjAvWW1YdHlDdkxIMlJUN0F6dDRNSUs4TFN1V3pBWERFaVZnaVBUVXA0bzBWUUtHdFFmWTh2VFM3Mk4wbmRHaGYxOTM0dFdIQ1hSWjhYZDZjekZKMnVXM3JDTitCblg2ZUVseHdUTHQ0VWR4WEhjNjNERHgiLCJtYWMiOiI4ODMwOThhNzBjMzFiODA1MDQxOTgzYmY0ZGI1Mjc5OTYwMzljM2IwNTQ1ZTA2ZGU0ZmI1YzQ5YTFjMTNiNmQwIiwidGFnIjoiIn0%3D; _ga_9B3TJ6KZR9=GS1.1.1732894786.36.1.1732896510.0.0.0; _ga=GA1.1.1556247139.1720956057'; // Your cookies here

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

    private function scrapeArticleContent($url, $client)
    {
        try {
            // Fetch article content using the code you've already shared
            $response = $client->get($url);
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);
            $articleContent = $crawler->filter('article')->html();

            Log::info("Article content for {$url}:");
            Log::info($articleContent);
        } catch (RequestException $e) {
            Log::error('Error while fetching article: ' . $e->getMessage());
        }
    }
}
