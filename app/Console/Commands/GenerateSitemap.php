<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'app:sitemap-generate';
    protected $description = 'Generate the sitemap';

    public function handle()
    {
        $sitemap = Sitemap::create();

        $articles = Article::all();

        foreach ($articles as $article) {
            $sitemap->add(
                Url::create(route('article.read', $article->slug))
                    ->setLastModificationDate($article->updated_at)
                    ->setPriority(0.8)
                    ->setChangeFrequency('weekly')
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
