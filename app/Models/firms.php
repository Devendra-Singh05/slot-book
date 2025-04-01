<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class firms extends Model
{
    //
    protected $fillable=['user_id','profilepic','map','gst_no','registration_number','pan_no','pincode','country','state','city','address_line_2','address_line_1','since','business_type','firm_email','firm_mobile','firm_name'];

    public function allschedules()
    {
        return $this->hasMany(Schedule::class, 'firm_id', 'id'); // Correct Relationship
    }
}