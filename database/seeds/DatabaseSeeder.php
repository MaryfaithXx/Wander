<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class)->times(20)->create();
		$events = factory(App\Event::class)->times(40)->create();
		$posts = factory(App\Post::class)->times(20)->create();

		
		foreach ($users as $oneUser) {				
			$oneUser->events()->sync($events->random(4)); //relación de N:M
			factory(App\Profile::class)->times(1)->create(['user_id' => $oneUser->id,]); //relación de 1:1
			$oneUser->posts()->associate($users->random(8)->first()->id);
			}
	
    }
}
