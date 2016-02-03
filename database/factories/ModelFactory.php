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

$factory->define(PortalComercial\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(PortalComercial\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence()
    ];
});

$factory->define(PortalComercial\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
		'description' => $faker->sentence(),
		'price' => $faker->randomFloat(2),
		'category_id' => $faker->numberBetween(1, 15),
		'featured' => $faker->boolean(),
		'recommend' => $faker->boolean()
    ];
});
