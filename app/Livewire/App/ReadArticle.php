<?php

namespace App\Livewire\App;

use App\Models\Article;
use Livewire\Component;
use Artesaos\SEOTools\SEOMeta;

class ReadArticle extends Component
{
    public $slug;
    public $article;
    public $randomArticles;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->article = Article::where('slug', $slug)->first();
        $this->randomArticles = Article::inRandomOrder()->limit(3)->get();
        $this->article->increment('views');
    }

    public function render()
    {
        return view('livewire.app.read-article')->layout('layouts.app');
    }
}
