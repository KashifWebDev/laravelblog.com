<?php

namespace App\Livewire\App\Courses;

use App\Models\Course;
use Livewire\Component;

class Index extends Component
{
    public $courses;

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function render()
    {
        return view('livewire.app.courses.index')->layout('layouts.app');
    }
}
