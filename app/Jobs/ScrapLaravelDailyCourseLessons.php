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

class ScrapLaravelDailyCourseLessons implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $url, public int $id)
    {

    }

    public function handle()
    {
        Log::info("[+] Scrap Lesson started for ".$this->url);

        $cookies = config("app.cookies.laraveldaily");

        try {
            $client = new Client([
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
                    'Cookie' => $cookies,
                ],
                'verify' => false,
            ]);

            $response = $client->get($this->url);
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);

            $results = [];

            $crawler->filter('aside > ol > li')->each(function (Crawler $li) use (&$results) {
                // Case 1: If <h3> exists inside the current <li>, extract its text
                if ($li->filter('h3')->count() > 0) {
                    $results[] = [
                        'type' => 'heading',
                        'text' => $li->filter('h3')->text(),
                    ];
                }

                // Case 2: If <ol> exists inside the current <li>, iterate through its <li> children
                if ($li->filter('ol > li')->count() > 0) {
                    $li->filter('ol > li')->each(function (Crawler $inner_li) use (&$results) {
                        // Case 2.1: If <a> directly contains <h4>, extract <h4>'s text and <a>'s href
                        if ($inner_li->filter('a > h4')->count() > 0) {
                            $aTag = $inner_li->filter('a');
                            $results[] = [
                                'type' => 'link',
                                'text' => $aTag->filter('h4')->text(),
                                'href' => $aTag->attr('href'),
                            ];
                        }

                        // Case 2.2: If <a> exists without <h4>, extract its text and href
                        elseif ($inner_li->filter('a')->count() > 0) {
                            $aTag = $inner_li->filter('a');
                            $results[] = [
                                'type' => 'link',
                                'text' => trim($aTag->text()),
                                'href' => $aTag->attr('href'),
                            ];
                        }
                    });
                }

                // Case 3: If <a> directly exists in the main <li>, extract its text and href
                if ($li->filter('a')->count() > 0 && $li->filter('a > h4')->count() === 0) {
                    $results[] = [
                        'type' => 'link',
                        'text' => $li->filter('a')->text(),
                        'href' => $li->filter('a')->attr('href'),
                    ];
                }
            });

            foreach ($results as $result) {
                $savedLesson = Lesson::create([
                    'course_id' => $this->id,
                    'title' => $result['text'],
                    'slug' => $result['type'] == 'link' ? explode('/', $result['href'])[5] : null,
                    'content' => null,
                    'type' => $result['type']
                ]);

                if($result['type'] == 'link')
                    dispatch(new ScrapLaravelDailyCourseSingleLesson($savedLesson->id, $result['href']));

            }


        } catch (RequestException $e) {
            Log::error('Error scraping article: ' . $e->getMessage());
        }
    }
}
