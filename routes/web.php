<?php

use App\Jobs\ScrapArticle;
use App\Livewire\App\Courses;
use App\Livewire\App\Home;
use App\Livewire\App\QuickTips;
use App\Livewire\App\ReadArticle;
use App\Livewire\App\Tutorials;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/post/{slug}', ReadArticle::class)->name('article.read');
Route::get('/courses', Courses::class)->name('article.courses');
Route::get('/premium-tutorials', Tutorials::class)->name('article.tutorials');
Route::get('/tips', QuickTips::class)->name('article.tips');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/scrap', function (){
    ScrapArticle::dispatch('https://laraveldaily.com/post/multi-step-form-vue-inertia-laravel-breeze');
});
