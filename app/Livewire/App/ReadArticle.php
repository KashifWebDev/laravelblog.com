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
        $this->setSeoTags();
    }

    public function setSeoTags()
    {
        // Set dynamic SEO tags
        view()->share('metaTitle', $this->article->title);
        $originalDescription = mb_strimwidth($this->article->content, 0, 300, '...');
        // Remove HTML tags
        $cleanedDescription = strip_tags($originalDescription);
        $cleanedDescription = html_entity_decode($cleanedDescription, ENT_QUOTES, 'UTF-8');
        $cleanedDescription = trim($cleanedDescription);
        $metaDescription = substr($cleanedDescription, 0, 160);

        view()->share('metaDescription', $metaDescription);
        view()->share('metaKeywords', str_replace(" ", ',', $this->article->title));
        view()->share('metaPic', asset('storage/' . $this->article->image));
        view()->share('ogType', 'article');
    }

    public function render()
    {
        return view('livewire.app.read-article')->layout('layouts.app');
    }
}
