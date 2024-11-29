<?php

namespace App\Livewire\App;

use App\Models\Article;
use Livewire\Component;

class Tutorials extends Component
{
    public $articles;


    public function mount()
    {
        $this->articles = Article::select('url', 'title', 'duration', 'word_count', 'count', 'og_image')
            ->orderBy('created_at', 'asc')
            ->get();
    }
    public function render()
    {
        return view('livewire.app.tutorials')->layout('layouts.app');
    }
}
