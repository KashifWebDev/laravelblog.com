<?php

namespace App\Livewire\App;

use Livewire\Component;

class Courses extends Component
{
    public function render()
    {
        return view('livewire.app.courses')->layout('layouts.app');
    }
}
