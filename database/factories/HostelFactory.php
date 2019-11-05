<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hostel;
use Faker\Generator as Faker;

$factory->define(Hostel::class, function (Faker $faker,$params) {
    return [
            'nom'=>$faker->name,
            'description'=>$faker->text,
            'image'=>$params['image'],
            'prix'=>'300.00',
            'day'=>'3',
    ];
});
