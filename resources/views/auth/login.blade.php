<x-layout>
    <section
        class="absolute top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 bg-[#CBE3FF] h-fit w-fit px-[3.68rem] pt-[4.88rem] pb-8 flex flex-col gap-[2.91rem] max-h-[100dvh] rounded-[1.71rem]">
        <img src="{{ asset('/img/auth/login.png') }}" alt="signup" class="max-w-[32.87rem]">
        <form method="POST" action="{{ route('authenticate') }}" class="flex flex-col gap-4 py-5 px-6">
            @csrf
            <h1 class="poppins-bold text-[2.73rem]">Войти</h1>
            <input placeholder="Почта" type="email" name="email"
                class="bg-white border border-solid border-[#ACB8C2] p-3 rounded-sm min-h-10 text-[1.2rem] poppins">
            <div class="relative">
                <button class="toggle-password absolute top-1/2 -translate-y-1/2 right-3">
                    <svg class="eye-icon" width="16" height="17" viewBox="0 0 16 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.0001 5.83366H11.3334V4.50033C11.3334 2.66033 9.84008 1.16699 8.00008 1.16699C6.16008 1.16699 4.66675 2.66033 4.66675 4.50033V5.83366H4.00008C3.26675 5.83366 2.66675 6.43366 2.66675 7.16699V13.8337C2.66675 14.567 3.26675 15.167 4.00008 15.167H12.0001C12.7334 15.167 13.3334 14.567 13.3334 13.8337V7.16699C13.3334 6.43366 12.7334 5.83366 12.0001 5.83366ZM8.00008 11.8337C7.26675 11.8337 6.66675 11.2337 6.66675 10.5003C6.66675 9.76699 7.26675 9.16699 8.00008 9.16699C8.73341 9.16699 9.33341 9.76699 9.33341 10.5003C9.33341 11.2337 8.73341 11.8337 8.00008 11.8337ZM10.0667 5.83366H5.93341V4.50033C5.93341 3.36033 6.86008 2.43366 8.00008 2.43366C9.14008 2.43366 10.0667 3.36033 10.0667 4.50033V5.83366Z"
                            fill="#656F77" />
                    </svg>
                </button>
                <input placeholder="Пароль" type="password" name="password"
                    class="bg-white border border-solid border-[#ACB8C2] p-3 rounded-sm min-h-10 text-[1.2rem] poppins w-full">
            </div>
            <input type="submit" value="Войти"
                class="bg-[#191D21] poppins-semibold text-[1.88rem] text-white min-h-[4.88rem] cursor-pointer transition-all duration-300 hover:bg-white hover:text-[#191D21]">
            <span class="w-full flex items-center justify-center text-[1.2rem] gap-2">
                <span class="text-[#656F77]">Еще нет аккаунта?</span>
                <a href="/signup" class="poppins-bold transition-all duration-300 hover:text-[#656F77]">Создать</a>
            </span>
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