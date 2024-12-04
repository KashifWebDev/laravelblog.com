<?php

use App\Console\Commands\GenerateSitemap;
use App\Console\Commands\ScrapArticles;
use App\Console\Commands\ScrapLaravelDailyCourses;
use App\Console\Commands\TestingCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//Schedule::command(ScrapArticles::class)->hourly();
//Schedule::command(GenerateSitemap::class)->hourly();
//Schedule::command(ScrapLaravelDailyCourses::class)->daily();
