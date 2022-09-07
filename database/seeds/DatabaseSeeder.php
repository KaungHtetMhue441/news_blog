<?php

use Illuminate\Database\Seeder;
use App\Article;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(Article::class,100)->create();
    }
}
