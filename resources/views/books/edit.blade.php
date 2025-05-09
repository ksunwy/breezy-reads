<x-layout>
    <section
        class="absolute top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 bg-[#FFDBF5] h-fit w-full m-7 mt-[6rem] px-[3.68rem] pt-[4.88rem] pb-8 flex flex-col gap-[2.91rem] max-h-[100dvh] max-w-[calc(100dvw-15rem)] rounded-[1.71rem]">
        <a href="{{ route('books.index') }}"
            class="rounded-sm border border-[#191D21] border-solid text-[1.3rem] w-fit px-3 py-2">Назад</a>
        <div class="flex flex-col gap-[.68rem] w-full">
            <img src="{{ asset($book->image_url) }}" alt="Current Image" class="w-[12.5rem] h-[18.63rem]">
        </div>

        <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data"
            class="flex flex-col gap-4 py-5 px-6">
            @csrf
            @method('PUT')
            <h1 class="poppins-bold text-[2.73rem]">Редактировать книгу</h1>

            <div class="flex items-center justify-between gap-[1.37rem]">
                <input placeholder="Название книги" type="text" name="title" value="{{ old('title', $book->title) }}"
                    required class="input">
                <input placeholder="Автор" type="text" name="author" value="{{ old('author', $book->author) }}" required
                    class="input">
                <input placeholder="Год публикации" type="number" name="publication_year"
                    value="{{ old('publication_year', $book->publication_year) }}" required class="input">
            </div>

            <div class="flex items-center justify-between gap-[1.37rem]">
                <input placeholder="Цена" type="number" step="0.01" name="price"
                    value="{{ old('price', $book->price) }}" required class="input">
                <input placeholder="Оригинальный язык" type="text" name="original_language"
                    value="{{ old('original_language', $book->original_language) }}" required class="input">

                <select name="category_id" required class="input">
                    <option value="">Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

            </div>

            <div class="flex items-center justify-between gap-[1.37rem]">
                <input placeholder="Скидка (необязательно)" type="number" name="discount"
                    value="{{ old('discount', $book->discount) }}" class="input">

                <div class="flex flex-col gap-[.68rem] w-full">
                    <label class="text-[1.2rem] poppins">Загрузить новое изображение (необязательно)</label>
                    <input type="file" name="image" accept="image/*" class="input">
                </div>

                <textarea placeholder="Описание (необязательно)" name="description"
                    class="input resize-none">{{ old('description', $book->description) }}</textarea>
            </div>

            <div class="flex items-center justify-between gap-[1.37rem]">
                <input placeholder="Количество продаж (необязательно)" type="number" name="sales_count"
                    value="{{ old('sales_count', $book->sales_count) }}" class="input">
                <input placeholder="Общая выручка (необязательно)" type="number" step="0.01" name="total_revenue"
                    value="{{ old('total_revenue', $book->total_revenue) }}" class="input">
                <input placeholder="Средний рейтинг (необязательно)" type="number" step="0.01" name="average_rating"
                    value="{{ old('average_rating', $book->average_rating) }}" class="input">
            </div>

            <input type="submit" value="Сохранить изменения"
                class="bg-[#191D21] poppins-semibold text-[1.88rem] text-white min-h-[4.88rem] cursor-pointer transition-all duration-300 hover:bg-white hover:text-[#191D21]">
        </form>

        @if ($errors->any())
            <div style="color:red">
                <ul class="list-none">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>

    <style>
        .input {
            background-color: white;
            border: 1px solid #ACB8C2;
            padding: 0.75rem;
            border-radius: 0.25rem;
            min-height: 2.5rem;
            font-size: 1.37rem;
            width: 100%;
        }
    </style>
</x-layout>