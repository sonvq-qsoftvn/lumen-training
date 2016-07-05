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

$factory->define(App\Model\User::class, function ($faker) {
    $hasher = app()->make('hash');
    
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => $hasher->make('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\Article::class, function ($faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->text,
    ];
});