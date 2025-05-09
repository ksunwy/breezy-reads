<x-layout>
    <section class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden mt-20 mb-5 p-10 scale-110">
        <div class="flex flex-col md:flex-row gap-10">
    
            <div class="flex-shrink-0">
                <img src="{{ asset($book->image_url) }}" alt="{{ $book->title }}" class="w-56 h-80 object-cover rounded-lg shadow">
            </div>
    
            <div class="flex flex-col gap-6 w-full">
                <h1 class="text-5xl font-bold text-gray-800">{{ $book->title }}</h1>
                <p class="text-2xl text-gray-600">Автор: <span class="font-semibold">{{ $book->author }}</span></p>
    
                <div class="grid grid-cols-2 gap-6 text-xl text-gray-700">
                    <p><strong>Год публикации:</strong> {{ $book->publication_year }}</p>
                    <p><strong>Цена:</strong> {{ number_format($book->price, 2) }} ₽</p>
                    <p><strong>Оригинальный язык:</strong> {{ $book->original_language }}</p>
                    <p><strong>Категория:</strong> {{ $book->category->name ?? 'Не указано' }}</p>
                    <p><strong>Скидка:</strong> {{ $book->discount }}%</p>
                    <p><strong>Продано:</strong> {{ $book->sales_count }} шт.</p>
                    <p><strong>Выручка:</strong> {{ number_format($book->total_revenue, 2) }} ₽</p>
                    <p><strong>Средний рейтинг:</strong> {{ number_format($book->average_rating, 2) }} ⭐</p>
                </div>
    
                @if ($book->description)
                <div class="mt-6">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-3">Описание</h2>
                    <p class="text-xl text-gray-700 leading-8">{{ $book->description }}</p>
                </div>
                @endif
    
                <a href="{{ route('books.index') }}" class="inline-block mt-8 bg-[#191D21] text-white px-6 py-4 rounded-lg text-xl hover:bg-gray-800 transition">
                    Назад к списку книг
                </a>
            </div>
    
        </div>
    </section>
    </x-layout>
    