<x-layout>
    <section class="relative w-full flex items-center bg-blue-200 h-[92.46rem]">
        <div class="hidden md:flex absolute top-1/2 left-[70%] -translate-x-1/2 -translate-y-1/2 items-center justify-center gap-x-20 w-[65rem] h-[63rem] bg-[#191D21] rounded-2xl z-10">
            <div class="relative w-[57.44rem] h-[52.99rem]">
                <img src="{{ asset('/img/home/main.png') }}" alt="hero" class="object-cover w-full h-full rounded-2xl" />
            </div>
        </div>

        <div class="relative flex flex-col gap-[4.36rem] w-[40rem] lg:w-[71.4rem] ml-[10%] z-20">

            <div class="flex flex-col gap-[3.42rem] w-full p-[5.13rem] bg-white rounded-md shadow-[11px_4px_17px_rgba(0,0,0,0.25)]">
                <h1 class="text-[5.13rem] leading-[128%] tracking-[-1px] poppins-bold">
                    Breezy reads
                </h1>
                <p class="text-[2.73rem] leading-[3.25rem] text-[#656F77] raleway">
                    Привет, ищешь классную книгу? Мы помогли миллионам людей по всей стране найти свою идеальную пару... и вы — следующий!
                </p>
            </div>

            <div class="relative">
                <img src="{{ asset('/img/icons/search.png') }}" alt="search" class="absolute left-[1.9rem] top-1/2 transform -translate-y-1/2 z-10 w-[1.71rem] h-[1.71rem]" />
                <input type="search" id="search" placeholder="Поиск..." class="w-full py-[3rem] pl-[5.13rem] pr-[3rem] rounded-md poppins text-[1.76rem] h-16 leading-[1.37rem] shadow bg-white" />
            </div>

        </div>

    </section>

    <section class="h-[46.23rem] min-h-fit w-full px-[8.56rem] py-[5.22rem] flex flex-col items-center gap-[7.1rem]">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-[9.93rem]">
            <div class="flex flex-col shadow-[8px_4px_17px_rgba(0,0,0,0.16)] rounded-2xl bg-white w-[29.36rem]">
                <div class="bg-blue-200 flex items-center justify-center p-2 rounded-t-2xl">
                    <img src="{{ asset('/img/home/books1.png') }}" alt="books" class="rounded-[.86rem]">
                </div>
                <div class="flex items-center justify-between p-6">
                    <span class="poppins-bold text-[2.93rem] tracking-[-.2px]">8K+</span>
                    <span class="raleway-semibold text-[1.88rem] text-[#656F77] text-right">Фантастика</span>
                </div>
            </div>

            <div class="flex flex-col shadow-[8px_4px_17px_rgba(0,0,0,0.16)] rounded-2xl bg-white w-[29.36rem]">
                <div class="bg-[#D9FFF8] flex items-center justify-center p-2 rounded-t-2xl">
                    <img src="{{ asset('/img/home/books2.png') }}" alt="books" class="rounded-[.86rem]">
                </div>
                <div class="flex items-center justify-between p-6">
                    <span class="poppins-bold text-[2.93rem] tracking-[-.2px]">5K+</span>
                    <span class="raleway-semibold text-[1.88rem] text-[#656F77] text-right">Наука</span>
                </div>
            </div>

            <div class="flex flex-col shadow-[8px_4px_17px_rgba(0,0,0,0.16)] rounded-2xl bg-white w-[29.36rem]">
                <div class="bg-[#FFF3B6] flex items-center justify-center p-2 rounded-t-2xl">
                    <img src="{{ asset('/img/home/books3.png') }}" alt="books" class="rounded-[.86rem]">
                </div>
                <div class="flex items-center justify-between p-6">
                    <span class="poppins-bold text-[2.93rem] tracking-[-.2px]">2K+</span>
                    <span class="raleway-semibold text-[1.88rem] text-[#656F77] text-right">Статьи</span>
                </div>
            </div>

            <div class="flex flex-col shadow-[8px_4px_17px_rgba(0,0,0,0.16)] rounded-2xl bg-white w-[29.36rem]">
                <div class="bg-[#DED2F9] flex items-center justify-center p-2 rounded-t-2xl">
                    <img src="{{ asset('/img/home/books4.png') }}" alt="books" class="rounded-[.86rem]">
                </div>
                <div class="flex items-center justify-between p-6">
                    <span class="poppins-bold text-[2.93rem] tracking-[-.2px]">3K+</span>
                    <span class="raleway-semibold text-[1.88rem] text-[#656F77] text-right">Обучение</span>
                </div>
            </div>
        </div>
        <div class="adaptive items-center gap-[1.71rem] lg:gap-[9.93rem]">
            <a href="/books" class="bg-transparent w-full lg:w-fit poppins-semibold text-[2.39rem] px-[9.16rem] py-[1.37rem] flex items-center justify-center text-center rounded-sm border-[#191D21] border-solid border-2 transition-all duration-300 hover:bg-[#191D21] hover:text-white">Каталог</a>
            <a href="/login" class="bg-[#191D21] w-full lg:w-fit text-white poppins-semibold text-[2.39rem] px-[9.16rem] py-[1.37rem] flex items-center justify-center text-center rounded-sm border-[#191D21] border-solid border-2 transition-all duration-300 hover:bg-white hover:text-[#191D21]">Войти</a>
        </div>
    </section>

    <section class="h-[46.23rem] w-full px-[8.56rem] py-[5.22rem] flex flex-col items-center justify-center gap-[7.1rem] bg-[#FFDBF5]">
        <h2 class="tracking-[-1px] text-[3.76rem] poppins-bold">Категории книг</h2>
        <div class="flex items-center gap-[6.59rem] flex-nowrap overflow-x-scroll max-w-[calc(100dvw-1rem)] px-40">
            @foreach ($categories as $i)
            <div class="flex bg-white rounded-2xl min-w-[29.36rem]">
                <div class="bg-[{{ $i->color }}] rounded-l-2xl w-[13.99rem] h-[10.1rem] flex items-center justify-center">
                    <img src="{{ $i->image_url }}" alt="{{ $i->name }}" width="65">
                </div>
                <div class="flex flex-col gap-2 py-[1.71rem] pl-[1.3rem] pr-2">
                    <span class="poppins-bold text-2xl">{{ $i->name }}</span>
                    <span class="">{{ $i->book_count }} {{ trans_choice('book.books', $i->book_count) }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="relative items-center justify-center h-[92.46rem] hidden lg:flex">
        <div class="bg-[#FFD1B6] rounded-[1.71rem] lg:w-[123.63rem] w-[calc(100dvw-1rem)] h-[64.46rem] flex flex-col gap-12 pt-[3.85rem] pl-[7.61rem] pr-[6.33rem]">
            <h2 class="text-center tracking-[-1px] text-[3.76rem] poppins-bold">Бестселлеры</h2>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-[1.71rem] flex-nowrap overflow-x-scroll max-w-[76.369rem]">
                    @foreach ($remainingBooks as $i)
                    <div class="flex flex-col justify-between rounded-2xl min-w-[20.54rem] min-h-[32.36rem] bg-[{{ $i->color }}] h-full">
                        <img src="{{ $i->image_url }}" alt="{{ $i->title }}" class="w-[11.5rem] h-[17.63rem] flex mx-auto mt-[2.14rem]">
                    
                        <div class="flex flex-col gap-[1.71rem] px-[1.37rem] justify-between h-full">
                            <div class="flex flex-col gap-[.86rem] mt-3">
                                <h4 class="poppins-bold text-[2.22rem] tracking-[-1px] leading-[118%] text-balance">{{ $i->title }}</h4>
                                <span class="text-[1.71rem] poppins-bold leading-3">₽ {{ $i->price }}</span>
                            </div>
                    
                            <a href="/books" class="bg-white border border-solid w-full mt-auto border-[#191D21] h-10 flex items-center justify-center poppins-semibold px-[2.22rem] text-[1.2rem] rounded-sm mb-[1.71rem]">Узнать больше</a>
                        </div>
                    </div>
                    
                    @endforeach
                </div>
                <div class="flex gap-[6.33rem]">
                    <svg width="1" height="453" viewBox="0 0 1 453" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="1" height="453" fill="#656F77" />
                    </svg>
                    <div class="bg-white rounded-2xl w-[25.85rem] h-[37.5rem] flex items-center justify-center">
                        <img src="{{ $firstBook->image_url }}" alt="{{ $firstBook->title }}" class="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative flex flex-col gap-16 items-center w-full h-fit py-[9rem] lg:pt-0 px-[2rem]">
        <h2 class="text-center tracking-[-1px] text-[3.76rem] poppins-bold">Скидки</h2>
        <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-1 gap-[8.04rem]">
            @foreach ($discountedBooks as $i)
            <div class="relative flex flex-col gap-[1.24rem] rounded-2xl min-w-[20.54rem] min-h-[32.36rem] bg-[{{ $i->color }}]">
                <img src="{{ $i->image_url }}" alt="{{ $i->title }}" class="w-[11.5rem] h-[17.63rem] flex mx-auto mt-[2.14rem]">
                <div class="flex flex-col gap-[1.5rem] px-[1.37rem]">
                    <div class="flex flex-col gap-[.86rem]">
                        <h4 class="poppins-bold text-[2.22rem] tracking-[-1px] leading-[118%] text-balance">{{ $i->title }}</h4>
                        <span class="text-[1.71rem] poppins-bold leading-3">₽ {{ $i->price }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="/books" class="bg-white border border-solid border-[#191D21] h-10 flex items-center justify-center poppins-semibold px-[2.22rem] text-[1.2rem] rounded-sm w-full">Узнать больше</a>
                    </div>
                </div>
                <div class="absolute -top-[3px] -left-6 bg-[#191D21] text-white rounded-[1.71rem] px-[1.37rem] py-1 poppins-bold text-[1.71rem] leading-[128%]">-{{ floor($i->discount) }}%</div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="relative flex flex-col gap-[3.42rem] lg:gap-[12.67rem] items-center justify-center h-[92.46rem] min-h-fit p-10 w-full bg-[#DED2F9]">
        <h2 class="text-center tracking-[-1px] text-[3.76rem] poppins-bold">Наши последние статьи</h2>
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-[1.71rem] lg:gap-[4.45rem]">
            @foreach ($articles as $i)
            <div 
                class="bg-white rounded-[1.71rem] py-[1.71rem] px-[2.14rem] flex flex-col gap-[3.42rem]"
            >
                <img src="{{ $i->image_url }}" alt="{{ $i->title }}" class="w-[38.18rem] h-[19.34rem] flex mx-auto">
                <div class="flex flex-col justify-between h-full gap-[1.23rem]">
                    <div class="flex flex-col gap-[5px] max-w-[36.21rem]">
                        <h4 class="poppins-bold text-[2.22rem]">{{ $i->title }}</h4>
                        <p 
                            class="text-[#656F77] raleway text-[1.2rem]"
                            style="display: -webkit-box;
                                    -webkit-line-clamp: 3;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    word-break: break-word;
                                    width: 100%;
                                    max-width: 400px;"
                        >
                            {{ $i->content }}
                        </p>
                    </div>
                    <a href="/articles" class="flex items-center gap-3 raleway-semibold text-[1.2rem]">
                        Читать далее
                        <svg width="23" height="13" viewBox="0 0 23 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.5406 7.03033C22.8335 6.73744 22.8335 6.26256 22.5406 5.96967L17.7676 1.1967C17.4747 0.903806 16.9998 0.903806 16.7069 1.1967C16.414 1.48959 16.414 1.96447 16.7069 2.25736L20.9496 6.5L16.7069 10.7426C16.414 11.0355 16.414 11.5104 16.7069 11.8033C16.9998 12.0962 17.4747 12.0962 17.7676 11.8033L22.5406 7.03033ZM-0.00976562 7.25H22.0102V5.75H-0.00976562V7.25Z" fill="black" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</x-layout>