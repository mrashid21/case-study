<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\EmpDetail::class, function (Faker $faker) {
    $location = Model\Address::pluck('id', 'id')->toArray();
    return [
        //
        'user_id' => factory(App\User::class),
        'emp_num' => rand(1111,9999),
        'profile' => $faker->paragraph,
        'address_id' => array_rand($location, 1), 
    ];
});
