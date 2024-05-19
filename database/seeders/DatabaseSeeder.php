<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\SubTodo;
use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Note::factory(100)->create();

        Todo::factory(30)->create();

        for ($i = 1; $i < 10; $i++) {
            SubTodo::factory(5)->create([
                'todo_id' => $i
            ]);
        }
    }
}
