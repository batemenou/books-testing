<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_books(): void
    {
        Book::factory()->count(3)->create();

        $response = $this->getJson('/api/books');

        $response->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_can_create_book(): void
    {
        $data = [
            'title' => 'New Book',
            'author' => 'Jane Doe',
            'publication_year' => 2023,
        ];

        $response = $this->postJson('/api/books', $data);

        $response->assertCreated()
            ->assertJsonPath('data.title', 'New Book');

        $this->assertDatabaseHas('books', $data);
    }

    public function test_can_show_a_book(): void
    {
        $book = Book::factory()->create();

        $response = $this->getJson("/api/books/{$book->id}");

        $response->assertOk()
            ->assertJsonPath('data.id', $book->id);
    }

    public function test_can_update_a_book(): void
    {
        $book = Book::factory()->create();

        $update = [
            'title' => 'Updated Title',
            'author' => 'Updated Author',
            'publication_year' => 2000,
        ];

        $response = $this->putJson("/api/books/{$book->id}", $update);

        $response->assertOk()
            ->assertJsonPath('data.title', 'Updated Title');

        $this->assertDatabaseHas('books', $update);
    }

    public function test_can_delete_a_book(): void
    {
        $book = Book::factory()->create();

        $response = $this->deleteJson("/api/books/{$book->id}");

        $response->assertOk()
            ->assertJson(['message' => 'Book deleted successfully']);

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
