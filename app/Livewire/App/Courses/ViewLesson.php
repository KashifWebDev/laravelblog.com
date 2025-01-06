<?php

namespace App\Livewire\App\Courses;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class ViewLesson extends Component
{
    public $course;
    public $viewData;
    public $lesson;
    public $previousLesson;
    public $nextLesson;

    public function mount(Course $course, $lesson)
    {
        $this->lesson = Lesson::whereSlug($lesson)->firstOrFail();

        $currentLesson = $course->lessons()
            ->where('slug', $lesson)
            ->firstOrFail();

        // Get course with lessons
        $courseWithLessons = $course->withCount('lessons')->first();

        if (!$courseWithLessons) {
            abort(404);
        }

        // Get all lessons and map them
        $lessons = $courseWithLessons->lessons->map(function ($lesson) {
            return [
                'title' => $lesson->title,
                'type' => $lesson->type,
                'slug' => $lesson->slug,
            ];
        });

        // Get previous and next lessons
        $this->previousLesson = $this->getPreviousLesson($lessons, $currentLesson);
        $this->nextLesson = $this->getNextLesson($lessons, $currentLesson);

        // Prepare view data
        $this->viewData = [
            'course' => [
                'course' => $courseWithLessons,
                'lesson_content' => $currentLesson->content,
                'lessons_count' => $courseWithLessons->lessons_count,
                'lessons' => $lessons
            ],
            'lesson' => $currentLesson,
            'previousLesson' => $this->previousLesson,
            'nextLesson' => $this->nextLesson
        ];
        $this->course = $this->viewData['course'];
//        dd($previousLesson);
//        ['course']->slug
    }
    public function render()
    {
        return view('livewire.app.courses.view-lesson')->layout('layouts.app');
    }

    private function getPreviousLesson($lessons, $currentLesson)
    {
        $lessonsList = $lessons->filter(function ($lesson) {
            return $lesson['type'] === 'link';
        })->values();

        $currentIndex = $lessonsList->search(function ($lesson) use ($currentLesson) {
            return $lesson['slug'] === $currentLesson->slug;
        });

        if ($currentIndex > 0) {
            return $lessonsList[$currentIndex - 1];
        }

        return null;
    }

    /**
     * Get the next lesson from the collection
     *
     * @param \Illuminate\Support\Collection $lessons
     * @param Lesson $currentLesson
     * @return array|null
     */
    private function getNextLesson($lessons, $currentLesson)
    {
        $lessonsList = $lessons->filter(function ($lesson) {
            return $lesson['type'] === 'link';
        })->values();

        $currentIndex = $lessonsList->search(function ($lesson) use ($currentLesson) {
            return $lesson['slug'] === $currentLesson->slug;
        });

        if ($currentIndex !== false && $currentIndex < $lessonsList->count() - 1) {
            return $lessonsList[$currentIndex + 1];
        }

        return null;
    }
}
