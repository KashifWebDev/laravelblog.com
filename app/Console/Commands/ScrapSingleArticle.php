<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class ScrapSingleArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scrap';

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
        $url = 'https://laraveldaily.com/post/multi-step-form-vue-inertia-laravel-breeze'; // Replace with the page URL
        $cookies = '_pk_id.1.fab2=ffcd9046582e3056.1720956058.; _gid=GA1.2.316436569.1732862876; remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d=eyJpdiI6Ill3eUNzM3R0RlF0RzRFMU93VU5MbHc9PSIsInZhbHVlIjoiZytwRkVVSU03dXdEL3p1aDJ1NUJsaXN6QnduNklubE5sUStieDV5cy9vNkZxc0czakJwNjZHdUdyODVrZzYxMXhneFB3OGh2a05Sb3RQQStMOXRoOVc5N3JyYlNuZHErY1N3NlcxYm05OTl1bHJwaWZFeTBzcExueks4UzNndlRNK2JIUnJxMTR4VUhINlRlNDkwaGwzTUcwU1puQlcrL2JNQ3R5WkxRVGVUWHdEM3dKWVRsWndwYUNJcHNFQzJQeE93eG5OYlptWmhuZStZRUg4aGlxZnNWc1ZYSWZZTDYvVWtXRm53ZGxmdz0iLCJtYWMiOiJmOGMyOTAxMGM4ZTY3MWIxNjRhZmNjYjdlNWU1Mzc5MGQ5ZmQ1NmQ3MjkyN2M4M2Q5NGI4NTc2NTRhMjI5ODBkIiwidGFnIjoiIn0%3D; _pk_ref.1.fab2=%5B%22%22%2C%22%22%2C1732894786%2C%22https%3A%2F%2Fwww.linkedin.com%2F%22%5D; _pk_ses.1.fab2=1; XSRF-TOKEN=eyJpdiI6IkZUVEtNbWJDT1hPL0Iwb09vT1FIdXc9PSIsInZhbHVlIjoiMFd6TmlpVUplbDY3eWo0ZEtkaXdnL0hCdFZLSkZlY2d0RFlMOUpBWnFTNkV0Snd6WVQ3d3pkOHY1T0V0dEJqRC9KNkU4ZThPNVJxUzMzNWJSUE9JUUkyK0JCaUU5aWVQbXVER1NvR3R2RG5GRUkyRGdrcnZSMFkxSzB3dldHZTkiLCJtYWMiOiJhZTdhODg0ZWZlZGE0MGNhZDNlZGIwOGVmNTkzMDgwNzVjYTBkNjQ0Y2I5NDYxZWUzZGFmM2ZiYzI5MGQzOTU1IiwidGFnIjoiIn0%3D; laravel_daily_session=eyJpdiI6IjdZaGZOSHVpMnd3NVBZUks1MGR4L2c9PSIsInZhbHVlIjoiMzNvcnA3b0JzMWtSbGl1eW55Z0xRdmFieTVabm9iU2VmUkd0VzNkendmRVNCUUlVeHY5d3FPUWE5Q1lGeXRoeVV4Rkw5VmtaeE1MeFZ0aWxkYUZFZno2L0JlR0pWdnB4M1FHeFlrcHFhMVprZnpUY1Z4dnR5Q0ltSG5ieFhaOVQiLCJtYWMiOiJhNzg1MDIzMzEzMWUxZTU0YWQ4YjM2NDQyNjAyMDNjOWRiNjA4YTRmOTEyY2Q2MzAzMDMyMTkzNGUyZDU0NmM4IiwidGFnIjoiIn0%3D; _ga_9B3TJ6KZR9=GS1.1.1732894786.36.1.1732894800.0.0.0; _ga=GA1.1.1556247139.1720956057'; // Replace with your cookie string

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
            $articleContent = $crawler->filter('article')->html();

            Log::info($articleContent);

            return $html; // Parsed HTML content
        } catch (RequestException $e) {
            Log::info($e);
            return 'Error: ' . $e->getMessage();
        }
    }
}
