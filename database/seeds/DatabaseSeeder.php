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
      $users = factory(App\User::class)->times(5)->create();
		  $events = factory(App\Event::class)->times(10)->create();


		foreach ($users as $oneUser) {
			$oneUser->events()->sync($events->random(4)); //relación de N:M
			factory(App\Profile::class)->times(1)->create(['user_id' => $oneUser->id]); //relación de 1:1
			factory(App\Post::class)->times(8)->create(['user_id' => $oneUser->id]); //relacion de 1:N
      }

    }
}
