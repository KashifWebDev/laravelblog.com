<?php

namespace App\Livewire\App;

use App\Models\Article;
use Livewire\Component;

class Tutorials extends Component
{
    public $articles;


    public function mount()
    {
        $this->articles = Article::select('slug', 'title', 'duration', 'word_count', 'views', 'image')
            ->orderBy('created_at', 'asc')
            ->get();
    }
    public function render()
    {
        return view('livewire.app.tutorials')->layout('layouts.app');
    }
}
