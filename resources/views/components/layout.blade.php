<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breezy reads</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body
    class="relative min-h-[100dvh] flex flex-col items-center justify-center overflow-y-auto overflow-x-hidden bg-white">
    <header
        class="absolute left-1/2 -translate-x-1/2 p-[3.42rem] top-0 w-full max-w-full flex items-center justify-between z-[99999]">
        <a href="/" class="{{ request()->is('login') ? 'w-[17.29rem]' : 'w-[9.3rem]' }}">
            <svg width="40" height="50" viewBox="0 0 40 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M28.5 18C30.1052 18 31.5744 17.4182 32.7084 16.4539C33.7842 18.5589 35.9738 20 38.5 20C39.0163 20 39.5185 19.9398 40 19.8261V44C40 47.3137 37.3137 50 34 50H6C2.68629 50 0 47.3137 0 44V6C0 2.68629 2.68629 0 6 0H17.8096C16.6888 1.16789 16 2.75351 16 4.5C16 7.92851 18.6544 10.737 22.0203 10.9826C22.0069 11.1533 22 11.3258 22 11.5C22 15.0899 24.9101 18 28.5 18Z"
                    fill="#191D21" />
            </svg>
        </a>
        <ul class="flex items-center gap-9 raleway-bold text-2xl leading-10 cursor-pointer">
            <li><a class="hover:text-[#656F77] transition-all duration-300" href="/">Главная</a></li>
            <li><a class="hover:text-[#656F77] transition-all duration-300" href="/">Каталог</a></li>
            <li><a class="hover:text-[#656F77] transition-all duration-300" href="/">О нас</a></li>
            <li><a class="hover:text-[#656F77] transition-all duration-300" href="/">Аккаунт</a></li>
            <li><a class="hover:text-[#656F77] transition-all duration-300" href="/">FAQ</a></li>
        </ul>

        @auth
            {{-- @if (auth()->user()->role === 'admin')
            <p>Вы администратор.</p>
            @endif --}}
            <div class="flex items-center gap-10">
                <a href="/user/{{ auth()->user()->id }}" class="rounded-full bg-white w-[3rem] h-[3rem] p-3 flex items-center justify-center">
                    <svg class="w-[2.05rem] h-[2.05rem]" viewBox="0 0 19 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.5215 19.9404V17.9404C17.5215 16.8796 17.1001 15.8621 16.3499 15.112C15.5998 14.3619 14.5824 13.9404 13.5215 13.9404H5.52148C4.46062 13.9404 3.4432 14.3619 2.69306 15.112C1.94291 15.8621 1.52148 16.8796 1.52148 17.9404V19.9404"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M9.52148 9.94043C11.7306 9.94043 13.5215 8.14957 13.5215 5.94043C13.5215 3.73129 11.7306 1.94043 9.52148 1.94043C7.31235 1.94043 5.52148 3.73129 5.52148 5.94043C5.52148 8.14957 7.31235 9.94043 9.52148 9.94043Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:opacity-50 transition-all duration-300 cursor-pointer">
                        <svg class="w-[1.71rem] h-[1.71rem]" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.01953 19.7246H3.01953C2.4891 19.7246 1.98039 19.5139 1.60532 19.1388C1.23024 18.7637 1.01953 18.255 1.01953 17.7246V3.72461C1.01953 3.19418 1.23024 2.68547 1.60532 2.3104C1.98039 1.93532 2.4891 1.72461 3.01953 1.72461H7.01953"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.0195 15.7246L19.0195 10.7246L14.0195 5.72461" stroke="black" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19.0195 10.7246H7.01953" stroke="black" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>
        @else
            <a href="{{ request()->is('login') ? '/signup' : '/login' }}"
                class="bg-[#191D21] {{ request()->is('login') ? 'w-[17.29rem]' : 'w-[9.3rem]' }} flex items-center justify-center text-white rounded-sm poppins-semibold px-9 py-[.86rem] text-[1.71rem] transition-all duration-300 hover:bg-white hover:text-[#191D21]">
                {{ request()->is('login') ? 'Присоединиться' : 'Войти' }}
            </a>
        @endauth

    </header>
    {{ $slot }}
    <footer
        class="w-full bg-white h-[21.6rem] flex items-center justify-center gap-[42.05rem] {{ request()->is('login') || request()->is('signup') ? 'opacity-0 unvisible pointer-events-none select-none' : '' }}">
        <a href="/">
            <svg class="w-[6.67rem] h-[9.07rem]" viewBox="0 0 113 142" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M80.5126 50.8488C85.0471 50.8488 89.1978 49.2052 92.4013 46.4811C95.4402 52.4277 101.626 56.499 108.763 56.499C110.221 56.499 111.64 56.329 113 56.0076V135.25C113 138.564 110.314 141.25 107 141.25H6C2.68629 141.25 0 138.564 0 135.25V6C0 2.68629 2.68629 0 6 0H50.3115C47.1457 3.29926 45.2 7.77841 45.2 12.712C45.2 22.3976 52.6988 30.3317 62.2073 31.0253C62.1694 31.5073 62.1501 31.9946 62.1501 32.4863C62.1501 42.6277 70.3712 50.8488 80.5126 50.8488Z"
                    fill="#191D21" />
            </svg>
        </a>
        <div class="flex items-end gap-[31.59rem]">
            <div class="flex items-center gap-[2.99rem] text-[1.71rem] poppins-medium">
                <ul>
                    <li><a href="/" class="hover:text-[#656F77] transition-all duration-300">Home</a></li>
                    <li><a href="/" class="hover:text-[#656F77] transition-all duration-300">Catalog</a></li>
                    <li><a href="/" class="hover:text-[#656F77] transition-all duration-300">About Us</a></li>
                    <li><a href="/" class="hover:text-[#656F77] transition-all duration-300">Catalog</a></li>
                </ul>
                <ul>
                    <li><a href="/" class="hover:text-[#656F77] transition-all duration-300">Account</a></li>
                    <li><a href="/" class="hover:text-[#656F77] transition-all duration-300">FAQ</a></li>
                    <li><a href="/" class="hover:text-[#656F77] transition-all duration-300">TOS</a></li>
                    <li><a href="/" class="hover:text-[#656F77] transition-all duration-300">PP</a></li>
                </ul>
            </div>
            <div class="flex items-center gap-10">
                <a href="" class="hover:opacity-50 transition-all duration-300">
                    <svg class="w-10 h-10" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M46.0192 13.1078C45.7767 12.1389 45.2827 11.2511 44.5873 10.5341C43.8918 9.81715 43.0195 9.29641 42.0584 9.02449C38.5467 8.16699 24.5 8.16699 24.5 8.16699C24.5 8.16699 10.4534 8.16699 6.9417 9.10616C5.98057 9.37808 5.10823 9.89882 4.41278 10.6158C3.71732 11.3327 3.22339 12.2205 2.98086 13.1895C2.33817 16.7533 2.0238 20.3686 2.04169 23.9899C2.01879 27.6385 2.33318 31.2813 2.98086 34.872C3.24824 35.8108 3.75324 36.6649 4.44707 37.3516C5.14091 38.0382 6.00012 38.5344 6.9417 38.792C10.4534 39.7312 24.5 39.7312 24.5 39.7312C24.5 39.7312 38.5467 39.7312 42.0584 38.792C43.0195 38.5201 43.8918 37.9993 44.5873 37.2824C45.2827 36.5654 45.7767 35.6776 46.0192 34.7087C46.6569 31.1717 46.9713 27.5839 46.9584 23.9899C46.9813 20.3414 46.6669 16.6985 46.0192 13.1078Z"
                            stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19.9062 30.666L31.6458 23.9897L19.9062 17.3135V30.666Z" stroke="black"
                            stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <a href="" class="hover:opacity-50 transition-all duration-300">
                    <svg class="w-10 h-10" viewBox="0 0 35 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.7778 17.3V10.5M24.3889 17.3V10.5M33 2H2V29.2H10.6111V36L17.5 29.2H26.1111L33 22.4V2Z"
                            stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <a href="" class="hover:opacity-50 transition-all duration-300">
                    <svg class="w-10 h-10" viewBox="0 0 43 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M41 2.01793C39.3024 3.22255 37.4228 4.14389 35.4336 4.74647C34.366 3.51151 32.9471 2.63621 31.3688 2.23894C29.7906 1.84167 28.1291 1.9416 26.6091 2.52521C25.0892 3.10883 23.7841 4.14798 22.8703 5.50211C21.9565 6.85624 21.4782 8.46002 21.5 10.0965V11.8799C18.3847 11.9612 15.2977 11.2661 12.5141 9.85658C9.73041 8.44708 7.33647 6.36689 5.54545 3.80129C5.54545 3.80129 -1.54545 19.8515 14.4091 26.9849C10.7582 29.478 6.40905 30.7281 2 30.5517C17.9545 39.4684 37.4545 30.5517 37.4545 10.043C37.4529 9.54629 37.4054 9.05077 37.3127 8.56286C39.122 6.76789 40.3987 4.50164 41 2.01793Z"
                            stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButtons = document.querySelectorAll('.toggle-password');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    console.log("click");

                    const input = this.closest('div').querySelector('input');
                    const icon = this.querySelector('.eye-icon');

                    if (input) {
                        if (input.type === 'password') {
                            input.type = 'text';
                            icon.innerHTML = `
                        <path d="M12.0001 6.24284H11.3334V4.90951C11.3334 3.06951 9.84008 1.57617 8.00008 1.57617C6.16008 1.57617 4.66675 3.06951 4.66675 4.90951V6.24284H4.00008C3.26675 6.24284 2.66675 6.84284 2.66675 7.57617V14.2428C2.66675 14.9762 3.26675 15.5762 4.00008 15.5762H12.0001C12.7334 15.5762 13.3334 14.9762 13.3334 14.2428V7.57617C13.3334 6.84284 12.7334 6.24284 12.0001 6.24284ZM8.00008 12.2428C7.26675 12.2428 6.66675 11.6428 6.66675 10.9095C6.66675 10.1762 7.26675 9.57617 8.00008 9.57617C8.73341 9.57617 9.33341 10.1762 9.33341 10.9095C9.33341 11.6428 8.73341 12.2428 8.00008 12.2428ZM10.0667 6.24284H5.93341V4.90951C5.93341 3.76951 6.86008 2.84284 8.00008 2.84284C9.14008 2.84284 10.0667 3.76951 10.0667 4.90951V6.24284Z" fill="#656F77"/>
                        <path d="M14 17L2 3" stroke="#656F77" stroke-width="1.5"/>
                    `;
                        } else {
                            input.type = 'password';
                            icon.innerHTML = `
                        <path d="M12.0001 5.83366H11.3334V4.50033C11.3334 2.66033 9.84008 1.16699 8.00008 1.16699C6.16008 1.16699 4.66675 2.66033 4.66675 4.50033V5.83366H4.00008C3.26675 5.83366 2.66675 6.43366 2.66675 7.16699V13.8337C2.66675 14.567 3.26675 15.167 4.00008 15.167H12.0001C12.7334 15.167 13.3334 14.567 13.3334 13.8337V7.16699C13.3334 6.43366 12.7334 5.83366 12.0001 5.83366ZM8.00008 11.8337C7.26675 11.8337 6.66675 11.2337 6.66675 10.5003C6.66675 9.76699 7.26675 9.16699 8.00008 9.16699C8.73341 9.16699 9.33341 9.76699 9.33341 10.5003C9.33341 11.2337 8.73341 11.8337 8.00008 11.8337ZM10.0667 5.83366H5.93341V4.50033C5.93341 3.36033 6.86008 2.43366 8.00008 2.43366C9.14008 2.43366 10.0667 3.36033 10.0667 4.50033V5.83366Z" fill="#656F77" />
                    `;
                        }
                    }
                });
            });
        });
    </script>




</body>

</html>