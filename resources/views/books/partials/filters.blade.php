<form method="GET" action="{{ route('books.index') }}"
    class="w-full bg-white shadow lg:max-w-[calc(100%-17.97rem)] -mt-10 rounded-xl p-8 grid grid-cols-2 md:grid-cols-3 gap-6 items-end mb-12">

    <div class="flex flex-col">
        <label class="text-[1.3rem] mb-2 font-semibold text-gray-700">Категория</label>
        <select name="category" class="border border-[#ACB8C2] rounded-lg p-3 text-[1.3rem]">
            <option value="">Все категории</option>
            @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex flex-col">
        <label class="text-[1.3rem] mb-2 font-semibold text-gray-700">Год публикации (от)</label>
        <input type="number" name="year_from" value="{{ request('year_from') }}" placeholder="2000"
            class="border border-[#ACB8C2] rounded-lg p-3 text-[1.3rem]">
    </div>

    <div class="flex flex-col">
        <label class="text-[1.3rem] mb-2 font-semibold text-gray-700">Год публикации (до)</label>
        <input type="number" name="year_to" value="{{ request('year_to') }}" placeholder="2025"
            class="border border-[#ACB8C2] rounded-lg p-3 text-[1.3rem]">
    </div>

    <div class="flex flex-col">
        <label class="text-[1.3rem] mb-2 font-semibold text-gray-700">Цена до (₽)</label>
        <input type="number" step="0.01" name="price_to" value="{{ request('price_to') }}" placeholder="50"
            class="border border-[#ACB8C2] rounded-lg p-3 text-[1.3rem]">
    </div>

    <div class="flex flex-col">
        <label class="text-[1.3rem] mb-2 font-semibold text-gray-700">Язык оригинала</label>
        <input type="text" name="language" value="{{ request('language') }}" placeholder="Английский"
            class="border border-[#ACB8C2] rounded-lg p-3 text-[1.3rem]">
    </div>

    <div class="flex gap-3 mt-auto">
        <button type="submit"
            class="bg-[#191D21] text-white rounded-lg px-6 py-3 text-[1.3rem] hover:bg-gray-800 transition w-full">
            Применить
        </button>
        <a href="{{ route('books.index') }}"
            class="bg-gray-200 text-gray-800 rounded-lg px-6 py-3 text-[1.3rem] hover:bg-gray-300 transition w-full text-center">
            Сбросить
        </a>
    </div>

</form>