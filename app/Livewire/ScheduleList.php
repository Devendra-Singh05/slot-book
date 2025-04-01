<?php

namespace App\Livewire;

use App\Models\firms;
use App\Models\Schedule;
use Livewire\Component;

class ScheduleList extends Component
{
public $firms;

public function mount()
{
    $this->firms = firms::with('allschedules')->get(); // Firm के साथ उसके Schedules को लाना
    // dd($this->firms);
}
    // public $firm;
    // public $firm_id;
    // public $schedules = [];

    // public function mount($firm_id)
    // {
    //     $this->firm_id = $firm_id;
    //     $this->fetchSchedules();
    // }

    // public function fetchSchedules()
    // {
    //     // सिर्फ इस Firm के Schedules दिखाओ
    //     $this->schedules = Schedule::where('firm_id', $this->firm_id)
    //                                 ->latest()
    //                                 ->get();
    // }

    // public function deleteSchedule($id)
    // {
    //     $schedule = Schedule::find($id);
    //     if ($schedule) {
    //         $schedule->delete();
    //         session()->flash('message', '✅ Schedule Deleted Successfully!');
    //     }

    //     // डेटा को दोबारा लोड करो
    //     $this->fetchSchedules();
    // }
public function delete($id){
    // dd($id);
    $sid=Schedule::find($id);
    if($sid){
   $sid->delete();
}
}
    public function render()
    {
        return view('livewire.schedule-list');
    }
}