<?php

namespace App\Contracts;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookManagerInterface
{
    public function allBooks(): Collection;

    public function saveBook(array $data): Book;

    public function updateBook(int $id, array $data): Book;

    public function getBook(int $id): Book;

    public function deleteBook(int $id): bool;
}
