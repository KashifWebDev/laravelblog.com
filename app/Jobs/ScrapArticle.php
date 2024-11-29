<?php
namespace App\Jobs;

use App\Models\Article;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Storage;
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
        $cookies = '_pk_id.1.fab2=ffcd9046582e3056.1720956058.; _gid=GA1.2.316436569.1732862876; remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d=eyJpdiI6Ill3eUNzM3R0RlF0RzRFMU93VU5MbHc9PSIsInZhbHVlIjoiZytwRkVVSU03dXdEL3p1aDJ1NUJsaXN6QnduNklubE5sUStieDV5cy9vNkZxc0czakJwNjZHdUdyODVrZzYxMXhneFB3OGh2a05Sb3RQQStMOXRoOVc5N3JyYlNuZHErY1N3NlcxYm05OTl1bHJwaWZFeTBzcExueks4UzNndlRNK2JIUnJxMTR4VUhINlRlNDkwaGwzTUcwU1puQlcrL2JNQ3R5WkxRVGVUWHdEM3dKWVRsWndwYUNJcHNFQzJQeE93eG5OYlptWmhuZStZRUg4aGlxZnNWc1ZYSWZZTDYvVWtXRm53ZGxmdz0iLCJtYWMiOiJmOGMyOTAxMGM4ZTY3MWIxNjRhZmNjYjdlNWU1Mzc5MGQ5ZmQ1NmQ3MjkyN2M4M2Q5NGI4NTc2NTRhMjI5ODBkIiwidGFnIjoiIn0%3D; _pk_ref.1.fab2=%5B%22%22%2C%22%22%2C1732894786%2C%22https%3A%2F%2Fwww.linkedin.com%2F%22%5D; _pk_ses.1.fab2=1; XSRF-TOKEN=eyJpdiI6IkhiTUdtcjIwR0pjN0pVRTlUTGRJZXc9PSIsInZhbHVlIjoiYk84UFlIWmlxdGNybll5L0xsOUZWTzlPNkpxRERLdVE3UWhQUU1uMGM0cUEyNXFld2V5QU84TCthV2I2VDcyMGVod1VsQ1lWOUFDRzA3c21KazFxcHBKOHhkOEoyYTJaMmlrMjNHNGk1bllWK1Vudlh4Smt3RFhDNTZNeWhCZGgiLCJtYWMiOiJkZDBhZDFlZTRiYmQ0MGIzYTkzNDRlYjIzNzc1MWQ1NDI4OTJlNmE0MzE2YTA2NWRlZGFmYWU4NDYwZjI2NGMyIiwidGFnIjoiIn0%3D; laravel_daily_session=eyJpdiI6Ii9oK0d4UjdTZVAyZWNwc3ZSYU9GdlE9PSIsInZhbHVlIjoiRVRXQVA5YndZeUNxcjAvWW1YdHlDdkxIMlJUN0F6dDRNSUs4TFN1V3pBWERFaVZnaVBUVXA0bzBWUUtHdFFmWTh2VFM3Mk4wbmRHaGYxOTM0dFdIQ1hSWjhYZDZjekZKMnVXM3JDTitCblg2ZUVseHdUTHQ0VWR4WEhjNjNERHgiLCJtYWMiOiI4ODMwOThhNzBjMzFiODA1MDQxOTgzYmY0ZGI1Mjc5OTYwMzljM2IwNTQ1ZTA2ZGU0ZmI1YzQ5YTFjMTNiNmQwIiwidGFnIjoiIn0%3D; _ga_9B3TJ6KZR9=GS1.1.1732894786.36.1.1732896510.0.0.0; _ga=GA1.1.1556247139.1720956057'; // Replace with your cookie string

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

            // Extract Canonical URL
            $canonical = $crawler->filter('link[rel="canonical"]')->attr('href');

            // Extract Open Graph and Twitter tags
            $ogTitle = $crawler->filter('meta[property="og:title"]')->attr('content');
            $ogType = $crawler->filter('meta[property="og:type"]')->attr('content');
            $ogSiteName = $crawler->filter('meta[property="og:site_name"]')->attr('content');
            $ogImage = $crawler->filter('meta[property="og:image"]')->attr('content');
            $ogUrl = $crawler->filter('meta[property="og:url"]')->attr('content');

            // Extract Twitter card information
            $twitterTitle = $crawler->filter('meta[name="twitter:title"]')->attr('content');
            $twitterImage = $crawler->filter('meta[name="twitter:image"]')->attr('content');

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
                'url' => $url,
                'canonical_url' => $canonical,
                'og_title' => $ogTitle,
                'og_type' => $ogType,
                'og_site_name' => $ogSiteName,
                'og_image' => $imagePath, // Store the local image path
                'og_url' => $ogUrl,
                'twitter_title' => $twitterTitle,
                'twitter_image' => $twitterImage,
                'duration' => $duration,
                'word_count' => $wordCount,
            ]);

        } catch (RequestException $e) {
            Log::error('Error scraping article: ' . $e->getMessage());
        }
    }
}
