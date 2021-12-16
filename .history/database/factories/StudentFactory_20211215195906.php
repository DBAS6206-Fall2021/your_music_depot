<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Student;
use App\User as User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    static $password;

    $instructors = User::where('user_type_id', 3)->pluck("id")->toArray();

    return [
        'user_id' => $faker->randomElement($instructors),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    ];
});