<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker,$params) {
    return [
        'image'=>$params['image'],
        'hostel_id'=>$params['hostel_id'],

    ];
});
