<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

     Category::create([
        'Name' => 'Genaration 1'
        ]);

        Category::create([
            'Name' => 'Genaration 2'
        ]);

        Category::create([
            'Name' => 'Genaration 3'
        ]);

        Category::create([
            'Name' => 'Genaration 4'
        ]);

        Category::create([
            'Name' => 'Genaration 5'
        ]);

        Category::create([
            'Name' => 'Genaration 6'
        ]);

        Category::create([
            'Name' => 'Genaration 7'
        ]);

        Category::create([
            'Name' => 'Genaration 8'
        ]);

        Category::create([
            'Name' => 'Genaration 9'
        ]);
    }
}
