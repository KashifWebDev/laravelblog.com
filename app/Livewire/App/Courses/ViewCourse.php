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
//        $courses = $course->attach('lessons');

            $this->course = [
                'course' => $course,
                'content' => $course->content,
                'lessons_count' => $course->lessons()->count(),
                'lessons' => $course->lessons->map(function ($lesson) {
                    return[
                        'title' => $lesson->title,
                        'type' => $lesson->type,
                        'slug' => $lesson->slug,
                    ];
                })
            ];
        $this->setSeoTags();
    }
    public function render()
    {
        return view('livewire.app.courses.view-course')->layout('layouts.app');
    }

    public function setSeoTags()
    {
        // Set dynamic SEO tags
        view()->share('metaTitle', $this->course['course']->name);
        $originalDescription = mb_strimwidth($this->course['content'], 0, 500, '...');
        // Remove HTML tags
        $cleanedDescription = strip_tags($originalDescription);
        $cleanedDescription = html_entity_decode($cleanedDescription, ENT_QUOTES, 'UTF-8');
        $cleanedDescription = trim($cleanedDescription);
        $metaDescription = substr($cleanedDescription, 0, 500);

        view()->share('metaDescription', $metaDescription);
        view()->share('metaKeywords', str_replace(" ", ',', $this->course['course']->name));
        view()->share('ogType', 'article');
    }
}
