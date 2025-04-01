<?php

namespace App\Livewire;

use App\Models\Schedule;
use Livewire\Component;

class ScheduleForm extends Component
{
    public  $firm, $firm_id, $max_booking, $end_from, $start_from, $shift;
    public  $week=[];
    public $isOpen = false; // Modal को छिपाने के लिए Default False

    // protected $rules = [
    //     'firm_id' => 'required',
    //     'date' => 'required|date',
    //     'time' => 'required',
    //     'notes' => 'nullable|string',
    // ];
    // protected $listeners = [
    //     'setStartTime' => 'updateStartTime',
    //     'setEndTime' => 'updateEndTime',
    // ];
    
    // public function updateStartTime($time)
    // {
    //     $this->start_from = $time;
    // }
    
    // public function updateEndTime($time)
    // {
    //     $this->end_from = $time;
    // }

    
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function saveSchedule()
    {
        if (!$this->week) {
            $this->week = [];
        }
    
        foreach ($this->week as $day) {
            Schedule::create([
                'firm_id' => $this->firm_id,
                'week' => $day,
                'shift' => $this->shift,
                'start_from' => $this->start_from,
                'end_from' => $this->end_from,
                'max_booking' => intval($this->max_booking),
            ]);
        }
    
        // ✅ Success Message Set करो
        session()->flash('message', '✅ Schedule Successfully Created!');
    
        // ✅ Livewire Event Dispatch करो (loop के बाद)
        $this->dispatch('scheduleSaved');
    
        // ✅ Reset the form (लेकिन firm_id और firm को मत हटाओ)
        $this->reset(['week', 'shift', 'start_from', 'end_from', 'max_booking']);
        $this->resetExcept(['firm_id', 'firm']);
    
        // ✅ अब Modal बंद करो (foreach के बाहर)
        $this->closeModal();
    }
    // public $firm;

    public function mount($firm = null)
    {
        // dd($firm);
        // dd($firm->firm_id);
        $this->firm = $firm;
        $this->firm_id = $firm ? $firm->id : null;
        // dd($this->firm_id);
    }

    // public function show($firms = null){
    // dd($firms);
    // }
    public function render()
    {
        return view('livewire.schedule-form');
    }
}