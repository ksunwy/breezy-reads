<x-layout>
    <section
        class="absolute top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 bg-[#FFF3B6] h-fit w-fit px-[3.68rem] pt-[4.88rem] pb-8 flex flex-col gap-[2.91rem] max-h-[100dvh] rounded-[1.71rem]">
        <a href="{{ route('users.index') }}" class="text-[1.3rem]">Назад</a>
        <img src="{{ asset('/img/users/edit.png') }}" alt="edit" class="max-w-[32.87rem]">
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="flex flex-col gap-4 py-5 px-6">
            @csrf @method('PUT')
            <h1 class="poppins-bold text-[2.73rem]">Редактирование <br> пользователя</h1>
            <input placeholder="Имя" type="text" name="name" value="{{ $user->name }}"
                class="bg-white border border-solid border-[#ACB8C2] p-3 rounded-sm min-h-10 text-[1.2rem] poppins">
            <input placeholder="Почта" type="email" name="email" value="{{ $user->email }}"
                class="bg-white border border-solid border-[#ACB8C2] p-3 rounded-sm min-h-10 text-[1.2rem] poppins">
            <input type="submit" value="Редактировать"
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
</x-layout>