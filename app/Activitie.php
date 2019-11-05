<?php

namespace App;

use App\Hostel;
use Illuminate\Database\Eloquent\Model;

class Activitie extends Model
{
    protected $guarded=[];
    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
    
}
