<?php

namespace App\Livewire\App;

use Livewire\Component;

class QuickTips extends Component
{
    public function render()
    {
        return view('livewire.app.quick-tips')->layout('layouts.app');
    }
}
