<x-layout>
    <section class="relative flex flex-col gap-[5.65rem] items-center w-full py-[8.98rem] pt-[14rem]">
        <div class="flex items-center justify-between w-full max-w-[calc(100%-17.97rem)]">
            <div class="relative">
                <img src="{{ asset('/img/icons/search.png') }}" alt="search"
                    class="absolute left-[2.14rem] top-1/2 transform -translate-y-1/2 z-10 w-[1.71rem] h-[1.71rem]" />
                <input type="search" placeholder="Поиск..."
                    class="bg-white border poppins-medium border-solid text-[1.54rem] p-[1.5rem] pl-[5.22rem] border-[#ACB8C2] rounded-[4px] w-[61.1rem] h-[4.28rem]">
            </div>
            <a href="{{ route('users.create') }}" class="text-[1.54rem] font-semibold text-white bg-[#191D21] rounded-[4px] px-[1.5rem] py-[1.2rem] transition-all duration-300 hover:bg-white hover:text-[#191D21]">Создать статью</a>
        </div>
        <div class="flex flex-wrap justify-between max-w-[calc(100%-17.97rem)] gap-y-[5.13rem]">
            @foreach ($articles as $i)
                <div class="bg-[#DED2F9] rounded-[1.71rem] py-[1.71rem] px-[2.14rem] flex flex-col gap-[3.42rem]">
                    <img src="{{ $i->image_url }}" alt="{{ $i->title }}" class="w-[38.18rem] h-[19.34rem] flex mx-auto">
                    <div class="flex flex-col justify-between h-full gap-[1.23rem]">
                        <div class="flex flex-col gap-[5px] max-w-[36.21rem]">
                            <h4 class="poppins-bold text-[2.22rem]">{{ $i->title }}</h4>
                            <p class="text-[#656F77] raleway text-[1.2rem]" 
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
                        <a href="" class="flex items-center gap-3 raleway-semibold text-[1.2rem]">
                            Читать далее
                            <svg width="23" height="13" viewBox="0 0 23 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.5406 7.03033C22.8335 6.73744 22.8335 6.26256 22.5406 5.96967L17.7676 1.1967C17.4747 0.903806 16.9998 0.903806 16.7069 1.1967C16.414 1.48959 16.414 1.96447 16.7069 2.25736L20.9496 6.5L16.7069 10.7426C16.414 11.0355 16.414 11.5104 16.7069 11.8033C16.9998 12.0962 17.4747 12.0962 17.7676 11.8033L22.5406 7.03033ZM-0.00976562 7.25H22.0102V5.75H-0.00976562V7.25Z"
                                    fill="black" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>