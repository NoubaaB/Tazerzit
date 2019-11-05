<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded=[];
    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
