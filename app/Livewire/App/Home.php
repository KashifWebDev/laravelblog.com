<?php

namespace App\Livewire\App;

use App\Models\Article;
use App\Models\Course;
use Livewire\Component;

class Home extends Component
{
    public $featured;
    public $articles;
    public $courses;


    public function mount()
    {
        $this->articles = Article::select('slug', 'title', 'duration', 'word_count', 'views', 'image', 'created_at')
            ->orderBy('views', 'asc')
            ->take(12)
            ->get();

        $this->courses =  Course::query()
            ->select('id', 'slug', 'name', 'words', 'published_at', 'image')
            ->orderBy('created_at', 'asc') // Sort courses by a relevant column
            ->take(15) // Limit to top 15 courses
            ->with(['lessons' => function ($query) {
                $query->select('course_id', 'title', 'slug')
                    ->orderBy('created_at', 'asc')
                    ->whereType('link')
                    ->take(4);
            }])
            ->get()
            ->random(3);

    }

    public function render()
    {
        return view('livewire.app.home')->layout('layouts.app');
    }
}
