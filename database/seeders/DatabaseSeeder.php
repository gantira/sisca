<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\Tag::factory(4)->create();
        \App\Models\Team::factory(3)->create();
        \App\Models\Category::factory(4)->create();
        \App\Models\Status::factory(3)->create();
    }
}
