<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class BooksExport implements FromCollection, WithHeadings
{
    protected $books;

    public function __construct(Collection $books)
    {
        $this->books = $books;
    }

    public function collection()
    {
        return $this->books->map(function ($book) {
            return [
                'title'            => $book->title,
                'author'           => $book->author,
                'publication_year' => $book->publication_year,
                'price'            => $book->price,
                'sales_count'      => $book->sales_count,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Название',
            'Автор',
            'Год публикации',
            'Цена',
            'Продажи',
        ];
    }
}
