<?php

namespace App\Livewire\App;

use App\Models\Article;
use Livewire\Component;

class Home extends Component
{
    public $featured;
    public $articles;


    public function mount()
    {
        $this->featured = Article::select('url', 'title', 'duration', 'word_count', 'count', 'og_image') ->orderBy('views', 'asc')->limit(4)->get();
        $this->articles = Article::select('url', 'title', 'duration', 'word_count', 'count', 'og_image')
            ->orderBy('views', 'asc')
            ->skip(2) // Skip the first 2 articles
            ->take(9) // Get the next 9 articles
            ->get();
    }

    public function render()
    {
        return view('livewire.app.home')->layout('layouts.app');
    }
}
