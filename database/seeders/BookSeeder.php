<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['title' => '1984', 'author' => 'George Orwell', 'publication_year' => 1949],
            ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'publication_year' => 1960],
            ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'publication_year' => 1925],
            ['title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'publication_year' => 1813],
            ['title' => 'Moby Dick', 'author' => 'Herman Melville', 'publication_year' => 1851],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
