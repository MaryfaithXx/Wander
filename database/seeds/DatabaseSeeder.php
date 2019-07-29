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
			//$oneUser->posts()->associate($posts->random(8)->first()->id); https://laracasts.com/discuss/channels/eloquent/eloquent-sync-associate?page=1
			factory(App\Post::class)->times(8)->create(['user_id' => $oneUser->id,]); //relacion de 1:N	
			}
	
    }
}
