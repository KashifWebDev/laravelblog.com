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
                'source' => 'https://laraveldaily.com/'
            ]);

            \Log::info('Inserting Article:', [
                'title' => $heading,
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
