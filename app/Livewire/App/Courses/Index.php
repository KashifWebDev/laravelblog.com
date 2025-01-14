<?php

namespace App\Livewire\App\Courses;

use App\Models\Course;
use Livewire\Component;

class Index extends Component
{
    public $courses;
    public $tags;

    public function mount()
    {
        $this->courses = Course::all();
        $this->tags = [
            [
                'name' => 'Laravel',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Laravel Cashier',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Laravel Forge',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Laravel Livewire',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Laravel Octane',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Laravel Packages',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Laravel Reverb',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Laravel Vapor',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Eloquent',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Filament',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Pest',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Queues',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
            [
                'name' => 'Security',
                'pic'  => 'https://laracasts.com/images/logo/logo-triangle.svg?v=3'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.app.courses.index')->layout('layouts.app');
    }
}
