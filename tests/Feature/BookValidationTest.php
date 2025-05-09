<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_title_is_required(): void
    {
        $data = [
            'author' => 'Jane Austen',
            'publication_year' => 1813,
        ];

        $response = $this->postJson('/api/books', $data);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title']);
    }

    public function test_author_is_required(): void
    {
        $data = [
            'title' => 'Pride and Prejudice',
            'publication_year' => 1813,
        ];

        $response = $this->postJson('/api/books', $data);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['author']);
    }

    public function test_publication_year_is_required(): void
    {
        $data = [
            'title' => 'Pride and Prejudice',
            'author' => 'Jane Austen',
        ];

        $response = $this->postJson('/api/books', $data);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['publication_year']);
    }

    public function test_publication_year_must_be_between_1500_and_current_year(): void
    {
        $data = [
            'title' => 'Old Book',
            'author' => 'Unknown',
            'publication_year' => 1200,
        ];

        $response = $this->postJson('/api/books', $data);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['publication_year']);

        $data['publication_year'] = today()->year + 1;

        $response = $this->postJson('/api/books', $data);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['publication_year']);
    }

    public function test_valid_data_passes_validation(): void
    {
        $data = [
            'title' => 'Valid Book',
            'author' => 'Author Name',
            'publication_year' => 2020,
        ];

        $response = $this->postJson('/api/books', $data);

        $response->assertCreated()
            ->assertJsonPath('data.title', 'Valid Book');
    }
}
