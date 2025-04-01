<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable=['firm_id','week','start_from','end_from','shift','max_booking'];
}