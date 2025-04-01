<?php

namespace App\Http\Controllers;

use App\Models\firms;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(Auth::user()->getRoleNames());
        return view('firm.sch');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    //    if( $firm_id=request('firm_id')){
    //     $firm=firms::find($firm_id);
    //     return view('firm.schedule',compact('firm'));
    //    }
    //    return abort(403, 'Unauthorized Access');
    //     // dd('hello');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        foreach($request->week as $day){
        $info=[
            'firm_id'=>$request->firm_id,
            // 'week'=>json_encode($request->week),
            'week'=>$day,
            'shift'=>$request->shift,
            'start_from'=>$request->start_from,
            'end_from'=>$request->end_from,
            'max_booking'=>$request->max_booking,
        ];
        // dd($request);
        Schedule::create($info);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}