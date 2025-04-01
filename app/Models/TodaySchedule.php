<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodaySchedule extends Model
{
    //
    protected $fillable =['schedule_id','user_id','firm_id','shift','week','todaydate'];
    
}