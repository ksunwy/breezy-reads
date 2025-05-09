<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Book::select('title', 'author', 'publication_year', 'price', 'sales_count')->get();
    }

    public function headings(): array
    {
        return [
            'Название',
            'Автор',
            'Год публикации',
            'Цена ($)',
            'Продажи',
        ];
    }
}
