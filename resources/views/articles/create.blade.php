<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать статью</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="p-[2.99rem]">

    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data"
        class="relative w-full h-full adaptive items-center gap-[1.71rem]">
        @csrf
        <div class="border-2 border-solid border-[#191D21] rounded-[.86rem] w-full h-full min-h-[calc(100dvh-6rem)] flex flex-col gap-[1.71rem] py-[5.99rem] px-[2.91rem]">
            <input type="text" name="author" value="{{ old('author') }}" placeholder="Автор" class="border-2 border-solid border-[#191D21] text-[1.71rem] rounded-sm p-2 raleway-bold">
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Заголовок" class="border-2 border-solid border-[#191D21] text-[2.04rem] rounded-sm p-2 raleway-bold">

            <select name="topic" id="topic" class="border-2 border-solid border-[#191D21] text-[1.71rem] rounded-sm p-2 mb-[3.42rem]">
                <option disabled selected>Выберите тему</option>
                @foreach($topics as $topic)
                    <option class="text-[1.71rem]" value="{{ $topic }}" {{ old('topic') === $topic ? 'selected' : '' }}>
                        {{ $topic }}
                    </option>
                @endforeach
            </select>

            <div class="relative">
                <input type="file" name="image_url" id="image_url" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 invisible">
                <label for="image_url" class="absolute top-1/2 left-[33%] -translate-x-1/2 -translate-y-1/2 rounded-sm raleway-bold text-[1.71rem] cursor-pointer">+ Добавить</label>
            </div>
        </div>

        <div class="bg-[#DED2F9] rounded-[.86rem] w-full h-full min-h-[calc(100dvh-6rem)] flex flex-col gap-[.86rem] py-[5.99rem] px-[2.91rem]">
            <label for="content" class="font-semibold text-[1.71rem]">Содержание</label>
            <textarea name="content" id="content" rows="10" class="resize-none text-[1.54rem] border-2 border-solid border-[#191D21] rounded-sm p-2">{{ old('content') }}</textarea>
        </div>

        <div class="absolute bottom-0 left-1/2 -translate-1/2 w-[calc(100%-3.42rem)] lg:w-[calc(100%-31rem)] rounded-[.86rem] p-[1.71rem] border-2 border-solid border-[#191D21] bg-[#DED2F9] flex items-center justify-between">
            <div class="flex flex-col gap-[.86rem]">
                <span class="raleway-bold text-[1.71rem]">Создание статьи</span>
                <span class="poppins text-[1.37rem]">Заполни все поля и нажми сохранить</span>
            </div>
            <div class="adaptive items-center gap-[1.71rem]">
                <a href="{{ route('articles.index') }}" class="text-[1.71rem] raleway-bold rounded-sm p-3 px-[1.71rem] hover:bg-[#656F77] hover:text-white transition">Отмена</a>
                <button type="submit" class="bg-[#191D21] text-white text-[1.71rem] raleway-bold rounded-sm p-3 px-[1.71rem] hover:bg-[#656F77] transition">Сохранить</button>
            </div>
        </div>
    </form>

</body>

</html>
