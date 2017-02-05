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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
    	'surname' => $faker->name,
    	'street' => $faker->streetAddress,
    	'city' => $faker->city,
    	'phone' => $faker->latitude,
    	'nip' => $faker->latitude,
    	'companyname' => $faker->company,
        'email' => $faker->unique()->safeEmail,
    	'activated' => true,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
