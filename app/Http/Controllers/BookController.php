<?php

namespace App\Http\Controllers;

use App\Contracts\BookManagerInterface;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    protected BookManagerInterface $bookManager;

    public function __construct(BookManagerInterface $bookManager)
    {
        $this->bookManager = $bookManager;
    }

    public function index()
    {
        return response()->json($this->bookManager->allBooks());
    }

    public function store(BookRequest $request)
    {
        $book = $this->bookManager->saveBook($request->validated());
        return response()->json(BookResource::make($book), 201);
    }

    public function show($id)
    {
        $book = $this->bookManager->getBook($id);
        return new BookResource($book);
    }

    public function update(BookRequest $request, $id)
    {
        $updatedBook = $this->bookManager->updateBook($id, $request->validated());
        return new BookResource($updatedBook);
    }

    public function destroy($id)
    {
        $this->bookManager->deleteBook($id);
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
