<x-layout>
    <section class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl overflow-hidden mt-20 p-10">
        <h1 class="text-5xl font-bold text-gray-800 mb-8 text-center">Профиль пользователя</h1>
    
        <div class="flex flex-col gap-6 text-2xl text-gray-700">
    
            <div class="flex items-center gap-3">
                <span class="font-semibold text-gray-900 w-60">Имя пользователя:</span>
                <span>{{ $user->name }}</span>
            </div>
    
            <div class="flex items-center gap-3">
                <span class="font-semibold text-gray-900 w-60">Email:</span>
                <span>{{ $user->email }}</span>
            </div>
    
            <div class="flex items-center gap-3">
                <span class="font-semibold text-gray-900 w-60">Логин:</span>
                <span>{{ $user->login }}</span>
            </div>
    
            <div class="flex items-center gap-3">
                <span class="font-semibold text-gray-900 w-60">Роль:</span>
                <span>{{ $user->role }}</span>
            </div>
    
            <div class="flex items-center gap-3">
                <span class="font-semibold text-gray-900 w-60">Дата регистрации:</span>
                <span>{{ $user->registration_date }}</span>
            </div>
    
            <div class="flex items-center gap-3">
                <span class="font-semibold text-gray-900 w-60">Создан:</span>
                <span>{{ $user->created_at }}</span>
            </div>
    
            <div class="flex items-center gap-3">
                <span class="font-semibold text-gray-900 w-60">Последнее обновление:</span>
                <span>{{ $user->updated_at }}</span>
            </div>
    
        </div>
    
        <a href="{{ route('users.index') }}" class="inline-block mt-10 bg-[#191D21] text-white px-6 py-3 rounded-lg text-xl hover:bg-gray-800 transition text-center w-full">
            Назад к списку пользователей
        </a>
    </section>
    </x-layout>
    