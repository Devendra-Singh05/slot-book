<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodaySchedule extends Component
{
    protected $listeners = ['activeToggled' => 'toggleActive'];
    public $expandedactive = null; 

   
    public function toggleActive($index)
    {
        
        $this->expandedactive = ($this->expandedactive === $index) ? null : $index;
    }
    public function render()
    {
        return view('livewire.today-schedule');
    }
}