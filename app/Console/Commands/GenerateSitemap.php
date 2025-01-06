<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Course;
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

        // Add articles to sitemap
        $articles = Article::all();
        foreach ($articles as $article) {
            $sitemap->add(
                Url::create(route('article.read', $article->slug))
                    ->setLastModificationDate($article->updated_at)
                    ->setPriority(0.8)
                    ->setChangeFrequency('weekly')
            );
        }

        // Add courses and lessons to sitemap
        $courses = Course::all();
        foreach ($courses as $course) {
            // Add course page
            $sitemap->add(
                Url::create(route('courses.show', $course->slug))
                    ->setLastModificationDate($course->updated_at)
                    ->setPriority(0.9)
                    ->setChangeFrequency('weekly')
            );

            // Ensure the course has lessons before looping
            if ($course->lessons()->exists()) {
                foreach ($course->lessons as $lesson) {

//                    echo $course->slug. ' __ '. $lesson->slug.PHP_EOL;
//                    echo route('courses.show.lesson', ['course' => $course->slug, 'lesson' => $lesson->slug]).PHP_EOL;
                    if($course->slug != '' && $lesson->slug != ''){
                        $sitemap->add(
                            Url::create(route('courses.show.lesson', ['course' => $course->slug, 'lesson' => $lesson->slug]))
                                ->setLastModificationDate($lesson->updated_at)
                                ->setPriority(0.7)
                                ->setChangeFrequency('weekly')
                        );
                    }
                }
            }
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
