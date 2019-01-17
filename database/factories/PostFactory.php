<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'title' => $faker->word,
        'created_at' => $faker->dateTimeThisYear,
        'updated_at' => $faker->dateTimeThisYear,
        'upvotes' => $faker->numberBetween(0,100),
        'path'=> array_random(["pic1.jpg","pic2.jpg","pic3.jpg"])
    ];
});
