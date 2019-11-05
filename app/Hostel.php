<?php

namespace App;

use App\Activitie;
use App\Image;
use App\Book;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $guarded=[];
    public function activities()
    {
        return $this->hasMany(Activitie::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
