<?php

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'bio' => $faker->paragraph,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tag::class, function ($faker) {
    return [
    	'name'	=> $faker->word,
    ];
});


$factory->define(App\Post::class, function($faker) {
	$sentence = $faker->sentence;
	return [
		'title'			=> $sentence,
		'description'	=> $faker->paragraph,
		'slug'			=> \Illuminate\Support\Str::slug($sentence),
		'user_id'		=> 1,
	];
});
