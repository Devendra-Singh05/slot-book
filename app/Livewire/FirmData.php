<?php

namespace App\Livewire;

use App\Models\firms;
use App\Models\Schedule;
use App\Models\TodaySchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FirmData extends Component
{
    public $sch;
    public $expandedRowActive = null;
    public $firms; // Firms को स्टोर करने के लिए
    public $expandedRow = null; // Expanded Row का ट्रैक रखने के लिए

    // Component लोड होते ही Data लाने के लिए
    public function mount()
    { 
        $this->firms = Auth::user()->firm; // Logged-in User की Firms लाओ
    }

    // Row Expand/Collapse करने का Method
    public function toggleDetails($index)
    {
        // अगर row पहले से Expand है, तो Collapse कर दो, नहीं तो Expand करो
        $this->expandedRow = ($this->expandedRow === $index) ? null : $index;
    }
    
    public function toggleDetailsActive($id)
{
    $this->expandedRowActive = ($this->expandedRowActive === $id) ? null : $id;
    $day=now()->format('l');
    
    $this->sch = firms::with(['allschedules'=>function($q) use ($day){
        $q->where('week',$day);
    }])->find($id);
}
// public function Ts(){
//     // $this->sch=firms::with('allschedules')->get();
// //    dd($this->sch);
// }
    // View Render करना
    public function render()
    {
        return view('livewire.firm-data');
    }

    //today schedule store in database

    // public function store($schid, $firm_id)
    // {
    //     $schdata = Schedule::find($schid);
    //     $today = now()->format('l');
    
    //     if ($schdata->week !== $today) {
    //         return; // अगर आज का नहीं है, तो कुछ भी मत करो
    //     }
    
    //     $exists = TodaySchedule::where([
    //         'schedule_id' => $schid,
    //         'todaydate' => date('Y-m-d'),
    //     ])->exists();
    
    //     if ($exists) {
    //         return; // अगर पहले से added है, तो कुछ मत करो
    //     }
    
    //     TodaySchedule::create([
    //         'schedule_id' => $schid,
    //         'firm_id' => $firm_id,
    //         'user_id' => Auth::user()->id,
    //         'week' => $schdata->week,
    //         'shift' => $schdata->shift,
    //         'todaydate' => date('Y-m-d'),
    //     ]);
    // }
    public function toggleTodaySchedule($schid, $firm_id)
{
    $today = date('Y-m-d');

    $exists = TodaySchedule::where([
        'schedule_id' => $schid,
        'firm_id' => $firm_id,
        'user_id' => Auth::user()->id,
        'todaydate' => $today,
    ])->first();

    if ($exists) {
        $exists->delete();
    } else {
        $schdata = Schedule::find($schid);

        if ($schdata->week !== now()->format('l')) {
            return;
        }

        TodaySchedule::create([
            'schedule_id' => $schid,
            'firm_id' => $firm_id,
            'user_id' => Auth::user()->id,
            'week' => $schdata->week,
            'shift' => $schdata->shift,
            'todaydate' => $today,
        ]);
    }
}


}