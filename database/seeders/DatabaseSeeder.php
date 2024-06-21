<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        \App\Models\User::factory(10)->create();

        DB::table('categories')->truncate();
        $this->call(CategorySeeder::class);

        DB::table('articles')->truncate();
        $this->call(ArticleSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
