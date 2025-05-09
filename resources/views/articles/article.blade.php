<x-layout>
    <section class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden mt-[12rem] p-10 space-y-8">
        
        <h1 class="text-5xl font-bold text-gray-900">{{ $article->title }}</h1>
    
        <div class="flex flex-wrap items-center text-xl text-gray-600 gap-4">
            <span class="text-[1.54rem]"><strong>Автор:</strong> {{ $article->author }}</span>
            <span class="px-3 py-1 bg-gray-100 text-[1.54rem] rounded-full text-gray-800 text-base font-medium">{{ $article->topic }}</span>
        </div>

        @if ($article->image_url)
            <img src="{{ asset($article->image_url) }}" alt="{{ $article->title }}" class="w-full h-auto rounded-lg shadow">
        @endif
    
        <p class="prose prose-lg text-[1.37rem] max-w-none text-gray-800">
            {!! nl2br(e($article->content)) !!}
        </p>
    
        <a href="{{ route('articles.index') }}" class="inline-block mt-6 bg-[#191D21] text-white px-6 py-3 rounded-lg text-xl hover:bg-gray-800 transition">
            Назад к списку статей
        </a>
    
    </section>
    </x-layout>
    