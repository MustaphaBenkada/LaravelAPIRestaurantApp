<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    
        return [
            'name' => $faker->name,
            'description' => $faker->text(),
            'phone_number' => $faker->phoneNumber,
            'address' => $faker->sentence(),
            'type' => $faker->unique()->numberBetween(1,20),
            'image' => $faker->sentence(),
        ];
   
});
