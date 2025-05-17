<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class BookFilterTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_filters_books_by_category(): void
    {
        $category1 = Category::create(['name' => 'Sci-Fi']);
        $category2 = Category::create(['name' => 'Fantasy']);

        Book::create([
            'title' => 'Dune',
            'author' => 'Frank Herbert',
            'category_id' => $category1->id,
            'price' => 100
        ]);

        Book::create([
            'title' => 'The Hobbit',
            'author' => 'J.R.R. Tolkien',
            'category_id' => $category2->id,
            'price' => 120
        ]);

        $books = Book::where('category_id', $category1->id)->get();

        $this->assertCount(1, $books);
        $this->assertEquals('Dune', $books->first()->title);
    }
}
