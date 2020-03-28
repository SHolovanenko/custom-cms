<?php

use App\Models\Post;
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
        $this->call([
            UserSeeder::class,
            PageSeeder::class,
            ZoneSeeder::class,
            CategorySeeder::class,
            MenuSeeder::class, 
            PageZonesSeeder::class,
        ]);

        factory(Post::class, 25)->create();
    }
}
