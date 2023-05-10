<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// для паролей
use Illuminate\Support\Facades\Hash;

// модель пользователя
use App\Models\User;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(3)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'isAdmin' => true,
            'password' => Hash::make('1234')
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('5678')
        ]);

        Book::create([
            'title' => 'Война и мир',
            'author' => 'Лев Толстой',
            'availability' => true
        ]);

        Book::create([
            'title' => 'Преступление и наказание',
            'author' => 'Фёдор Достоевский',
            'availability' => false
        ]);
    }
}
