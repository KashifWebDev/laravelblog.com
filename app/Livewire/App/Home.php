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
        $this->featured = Article::select('slug', 'title', 'duration', 'word_count', 'views', 'image', 'created_at') ->orderBy('views', 'asc')->limit(4)->get();
        $this->articles = Article::select('slug', 'title', 'duration', 'word_count', 'views', 'image', 'created_at')
            ->orderBy('views', 'asc')
            ->skip(2)
            ->take(9)
            ->get();
    }

    public function render()
    {
        return view('livewire.app.home')->layout('layouts.app');
    }
}
