<?php

namespace App;

use App\Hostel;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded=[];
    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
