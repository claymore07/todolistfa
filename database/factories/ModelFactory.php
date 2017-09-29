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

$factory->define(App\Todolist::class, function (Faker\Generator $faker) {

    $faker->languageCode ='en_US';
    return [
        'title' => $faker->sentence(7,10),
        'user_id' => $faker->numberBetween(1,4),
        'description'=>$faker->paragraph(rand(5,10), true),


    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {

    $faker->languageCode ='en_US';
    return [
        'title' => $faker->sentence(7,10),
        'todolist_id' => $faker->numberBetween(1,10),
        'completed_at' => rand(0,1) == 0 ? NULL : $faker->dateTime(),


    ];
});
