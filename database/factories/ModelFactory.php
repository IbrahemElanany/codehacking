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
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role_id'=> $faker->numberBetween(1,3),
        'is_active'=> $faker->numberBetween(0,1),
    ];
});

// POST

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'category_id' => $faker->numberBetween(1,0),
        'photo_id' => 1,
        'title' => $faker->sentence(7,11),
        'body' => $faker->paragraph(rand(10,15),true),
        'sluggable'=> $faker->slug(),
    ];
});

// Role

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['administrator','author','subscriber']),
    ];
});

// Category

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['PHP','Laravel','bootstrap','Javascript','Restful']),
    ];
});

// Photo

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'file' => 'placeholder.jpg',
    ];
});

// Comment

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => $faker->numberBetween(1,10),
        'is_active' => $faker->numberBetween(1,0),
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'photo' => 'placeholder.jpg',
        'body' => $faker->paragraphs(1,true),
    ];
});

// Comment-Reply

$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
        'comment_id' => $faker->numberBetween(1,10),
        'is_active' => $faker->numberBetween(1,0),
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'photo' => 'placeholder.jpg',
        'body' => $faker->paragraphs(1,true),
    ];
});
