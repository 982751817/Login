<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Users;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


$factory->define(App\Models\Users::class, function (Faker $faker) {
    return [
        'userName' => $faker->unique()->name,
        'password' => Hash::make('admin'), // password
        'api_token' => Str::random(10),
    ];
});
