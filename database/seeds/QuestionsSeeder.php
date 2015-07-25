<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Post::truncate();

    	$user = factory(User::class)->create();

    	foreach( range(0, 500) as $each ) {
	    	$faker = Faker\Factory::create();

	    	$sentence = $faker->sentence;

	    	Post::create([
				'title'			=> $sentence,
				'description'	=> $faker->paragraph,
				'slug'			=> \Illuminate\Support\Str::slug($sentence),
				'user_id'		=> $user->id,
	    	]);
    	}
    }
}
