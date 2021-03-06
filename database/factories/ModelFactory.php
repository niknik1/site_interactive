<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\ClientEvent::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->sentence,
        'desc' => $faker->paragraph,
        'active_from' => date("Y-m-d"),
        'active_to' => date("Y-m-d"),
        'status' => 1
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {


    return [
        'text' => $faker->sentence,
        'rate' => 5,
        'client_event_id' => $faker->numberBetween($min = 1, $max = 3),
        'user_id' => $faker->numberBetween($min = 1, $max = 30),
        'status' => 1
    ];
});

$factory->define(App\Election::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'type_id' => $faker->numberBetween($min = 1, $max = 3),
        'event_id' => $faker->numberBetween($min = 1, $max = 30),
    ];
});
