<?php

namespace App\Services;

use App\Contracts\BookManagerInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookManager implements BookManagerInterface
{
    public function allBooks(): Collection
    {
        return Book::all();
    }

    public function saveBook(array $data): Book
    {
        return Book::create($data);
    }

    public function getBook(int $id): Book
    {
        return Book::query()->findOrFail($id);
    }

    public function updateBook(int $id, array $data): Book
    {
        $book = $this->getBook($id);
        return tap($book)->update($data);
    }

    public function deleteBook(int $id): bool
    {
        $book = $this->getBook($id);
        return $book->delete();
    }
}
