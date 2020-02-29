<?php

use App\Article;
use App\User;
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
        factory(Article::class, 5)->create();

        $u = factory(User::class)->create();

        factory(Article::class, 5)->create([
            'author_id' => $u->id
        ]);
    }
}
