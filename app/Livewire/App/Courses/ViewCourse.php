<?php

namespace App\Livewire\App\Courses;

use App\Models\Course;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class ViewCourse extends Component
{
    public $course;
    public function mount(Course $course)
    {
        $courses = $course->withCount('lessons')->first();

        if ($courses) {
            $this->course = [
                'course' => $courses,
                'content' => $course->content,
                'lessons_count' => $courses->lessons_count,
                'lessons' => $courses->lessons->map(function ($lesson) {
                    return[
                        'title' => $lesson->title,
                        'type' => $lesson->type,
                        'slug' => $lesson->slug,
                    ];
                })
            ];
        }
    }
    public function render()
    {
        return view('livewire.app.courses.view-course')->layout('layouts.app');
    }
}
