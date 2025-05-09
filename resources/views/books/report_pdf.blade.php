
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отчет по книгам</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #191D21;
            color: #fff;
        }
        .highlight {
            background-color: #FFEEAA;
        }
        .danger {
            background-color: #FFBBBB;
        }
    </style>
</head>
<body>
    <h1>Отчет по книгам</h1>

    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Автор</th>
                <th>Категория</th>
                <th>Год</th>
                <th>Цена ($)</th>
                <th>Продажи</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr class="{{ $book->sales_count > 100 ? 'highlight' : ($book->sales_count == 0 ? 'danger' : '') }}">
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name ?? '—' }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>{{ number_format($book->price, 2) }}</td>
                    <td>{{ $book->sales_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>