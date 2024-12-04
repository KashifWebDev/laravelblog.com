<?php

namespace App\Livewire\App\Courses;

use App\Models\Course;
use Livewire\Component;

class ViewCourse extends Component
{
    public $course;
    public function mount($slug)
    {
        $this->course = Course::whereSlug($slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.app.courses.view-course')->layout('layouts.app');
    }
}
