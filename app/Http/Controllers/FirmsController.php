<?php

namespace App\Http\Controllers;

use App\Models\firms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $firms=Auth::user()->firm;
        // dd($firms);
        return view('firm.index',compact('firms'));
    //    return view('firm.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        //
        return view('firm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        // dd($request->all());
        $info=[
            'profilepic'=>$request->profilepic,
            'map'=>$request->map,
            'gst_no'=>$request->gst_no,
            'registration_number'=>$request->registration_number,
            'pan_no'=>$request->pan_no,
            'pincode'=>$request->pincode,
            'country'=>$request->country,
            'state'=>$request->state,
            'city'=>$request->city,
            'address_line_2'=>$request->address_line_2,
            'address_line_1'=>$request->address_line_1,
            'since'=>$request->since,
            'business_type'=>$request->business_type,
            'firm_email'=>$request->firm_email,
            'firm_mobile'=>$request->firm_mobile,
            'firm_name'=>$request->firm_name,
            'user_id'=>Auth::user()->id
        ];
        firms::create($info);
        // dd(Auth::user()->firm);
        return redirect('firm');
    }
    /**
     * Display the specified resource.
     */
    public function show(firms $firms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(firms $firms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, firms $firms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(firms $firms)
    {
        //
    }
    public function updateprofilepic(){
             $firmid=request('id');
             $fo=request('profilepic');
             $filename=time()."_".$fo->getClientOriginalName();
             $fo->move('./images',$filename);
             $firm=firms::find($firmid);
             if($firm->profilepic){
                unlink('./images/'.$firm->profilepic);
             }
             $firm->profilepic=$filename;
             $firm->save();
          return redirect('/firm');
            //  dd($filename);
    }
}