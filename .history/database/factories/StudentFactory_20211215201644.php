<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Student;
use App\User as User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    static $password;

    $clients = User::where('user_type_id', 3)->pluck("id")->toArray();

    return [
        'user_id' => $faker->randomElement($clients),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    ];
});