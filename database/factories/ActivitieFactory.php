<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activitie;
use Faker\Generator as Faker;

$factory->define(Activitie::class, function (Faker $faker,$params) {

    return [
        'article'=>$faker->name,
        'hostel_id'=>$params['hostel_id'],
    ];

});
