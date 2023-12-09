<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // user
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // Categories
        DB::table('categories')->insert([
            'name' => "Fiction",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => "Non-Fiction",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => "Psychology",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Books
        DB::table('books')->insert([
            'title' => "Book 1",
            'user_id' => 1,
            'category_id' => 1,
            'description' => 'Book 1 Desc',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('books')->insert([
            'title' => "Book 2",
            'user_id' => 1,
            'category_id' => 1,
            'description' => 'Book 2 Desc',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('books')->insert([
            'title' => "Book 3",
            'user_id' => 1,
            'category_id' => 2,
            'description' => 'Book 3 Desc',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('books')->insert([
            'title' => "Book 4",
            'user_id' => 2,
            'category_id' => 2,
            'description' => 'Book 4 Desc',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('books')->insert([
            'title' => "Book 5",
            'user_id' => 2,
            'category_id' => 3,
            'description' => 'Book 5 Desc',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('books')->insert([
            'title' => "Book 6",
            'user_id' => 2,
            'category_id' => 3,
            'description' => 'Book 6 Desc',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
