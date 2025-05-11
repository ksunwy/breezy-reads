<x-layout>
    <div class="bg-white shadow-md rounded-xl p-8 mb-8">
        <h1 class="text-3xl font-bold mb-6">Отчет по книгам</h1>

        <div class="flex gap-3 mt-6">
            <form method="GET" action="{{ route('books.export', 'pdf') }}">
                @foreach(request()->all() as $name => $value)
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endforeach
                <button type="submit"
                    class="text-[1.54rem] font-semibold w-full text-nowrap lg:w-fit flex items-center justify-center text-white bg-blue-600 rounded-[4px] px-[1.5rem] py-[1.2rem] transition-all duration-300 hover:bg-white hover:text-blue-600">
                    Сформировать PDF-отчет
                </button>
            </form>

            <form method="GET" action="{{ route('books.export', 'excel') }}">
                @foreach(request()->all() as $name => $value)
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endforeach
                <button type="submit"
                    class="text-[1.54rem] font-semibold w-full text-nowrap lg:w-fit flex items-center justify-center text-white bg-green-600 rounded-[4px] px-[1.5rem] py-[1.2rem] transition-all duration-300 hover:bg-white hover:text-green-600">
                    Сформировать Excel-отчет
                </button>
            </form>
        </div>


        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-lg">
                    <th class="p-3 border-b">Название</th>
                    <th class="p-3 border-b">Автор</th>
                    <th class="p-3 border-b">Год</th>
                    <th class="p-3 border-b">Цена</th>
                    <th class="p-3 border-b">Продажи</th>
                    <th class="p-3 border-b">Выручка</th>
                    <th class="p-3 border-b">Категория</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border-b">{{ $book->title }}</td>
                        <td class="p-3 border-b">{{ $book->author }}</td>
                        <td class="p-3 border-b">{{ $book->publication_year }}</td>
                        <td class="p-3 border-b {{ $book->price > 30 ? 'text-red-600 font-bold' : '' }}">${{ $book->price }}
                        </td>
                        <td
                            class="p-3 border-b {{ $book->sales_count > 100 ? 'bg-green-100 text-green-800 font-semibold px-2 rounded' : '' }}">
                            {{ $book->sales_count }}</td>
                        <td class="p-3 border-b">₽{{ $book->total_revenue }}</td>
                        <td class="p-3 border-b">{{ $book->category->name ?? '—' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>