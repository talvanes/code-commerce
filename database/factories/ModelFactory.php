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
        'name' => $faker->unique()->word,
        'description' => $faker->sentence()
    ];
});

$factory->define(PortalComercial\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
		'description' => $faker->sentence(),
<<<<<<< HEAD
		'price' => (int) $faker->randomFloat(2, 100, 1000000),
		'category_id' => $faker->numberBetween(1, 15),
        'user_id' => $faker->numberBetween(1, 10),
=======
		'price' => $faker->randomFloat(2),
		'category_id' => $faker->numberBetween(1, 15),
>>>>>>> 12d284a521f8d542aeb4d91f70ebd93758e05806
		'featured' => $faker->boolean(),
		'recommend' => $faker->boolean()
    ];
});
