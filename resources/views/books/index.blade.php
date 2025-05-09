<x-layout>
    <section class="relative flex flex-col gap-[5.65rem] items-center w-full py-[8.98rem] pt-[14rem]">
        <div class="flex items-center justify-between w-full max-w-[calc(100%-17.97rem)] gap-3">
            <form method="GET" action="{{ route('books.index') }}" class="relative">
                <img src="{{ asset('/img/icons/search.png') }}" alt="search"
                class="absolute left-[2.14rem] top-1/2 transform -translate-y-1/2 z-10 w-[1.71rem] h-[1.71rem]" />
                <input type="search" placeholder="Поиск..." name="search" value="{{ request('search') }}"
                class="bg-white border poppins-medium border-solid text-[1.54rem] p-[1.5rem] pl-[5.22rem] border-[#ACB8C2] rounded-[4px] w-[61.1rem] h-[4.28rem]">
            </form>
            @auth
                @if(auth()->user() && auth()->user()->role === 'Администратор')
                    <div class="flex gap-3">
                        <a href="{{ route('books.create') }}"
                            class="text-[1.54rem] font-semibold text-white bg-[#191D21] rounded-[4px] px-[1.5rem] py-[1.2rem] transition-all duration-300 hover:bg-white hover:text-[#191D21]">
                            Создать книгу
                        </a>
                        <a href="{{ route('books.report') }}"
                            class="text-[1.54rem] font-semibold text-white bg-blue-600 rounded-[4px] px-[1.5rem] py-[1.2rem] transition-all duration-300 hover:bg-white hover:text-blue-600">
                            Сформировать отчет
                        </a>
                    </div>
                @else
                    <div class=""></div>
                @endif
            @endauth
            </div>
        @include('books.partials.filters')
        <div class="flex flex-wrap justify-between max-w-[calc(100%-17.97rem)] gap-[5.13rem]">
            @if($books->isEmpty())
                <p class="text-center py-4 text-[1.54rem]">Книги не найдены.</p>
            @else
                @foreach ($books as $i)
                    <div onclick="window.location='{{ url('/book/' . $i->id) }}'"
                        class="relative bg-[#FFDBF5] rounded-[1.37rem] py-[1.71rem] px-[2.14rem] flex flex-col gap-[1.71rem] max-w-[19.43rem] w-[19.43rem]">
                        @if($i->discount != 0)
                            <div
                                class="absolute -top-[5px] -left-8 bg-[#191D21] text-white poppins-medium text-[1.37rem] px-3 py-2 rounded-[1.37rem]">
                                ₽{{ $i->discount }}
                            </div>
                        @endif
                        <img src="{{ $i->image_url }}" alt="{{ $i->title }}" class="w-[12.5rem] h-[18.63rem] flex mx-auto">
                        <div class="flex flex-col gap-[.86rem]">
                            <span class="text-[1.88rem] leading-[110%] poppins-bold text-wrap">{{ $i->title }}</span>
                            <span class="text-[1.37rem] poppins-bold ">${{ $i->price }}</span>
                        </div>
                        @auth
                            @if(auth()->user() && auth()->user()->role === 'Администратор')
                                <div class="w-full flex items-center justify-between mt-auto">
                                    <a href="{{ route('books.edit', $i->id) }}"
                                        class="poppins-semibold text-[1.71rem] cursor-pointer hover:text-[#656F77] transition-all duration-300">
                                        <svg class="w-[2.05rem] h-[2.05rem]" viewBox="0 0 23 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.3264 4.0625H3.32642C2.79598 4.0625 2.28728 4.27321 1.9122 4.64829C1.53713 5.02336 1.32642 5.53207 1.32642 6.0625V20.0625C1.32642 20.5929 1.53713 21.1016 1.9122 21.4767C2.28728 21.8518 2.79598 22.0625 3.32642 22.0625H17.3264C17.8568 22.0625 18.3656 21.8518 18.7406 21.4767C19.1157 21.1016 19.3264 20.5929 19.3264 20.0625V13.0625"
                                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M17.8264 2.56248C18.2242 2.16466 18.7638 1.94116 19.3264 1.94116C19.889 1.94116 20.4286 2.16466 20.8264 2.56248C21.2242 2.96031 21.4477 3.49987 21.4477 4.06248C21.4477 4.62509 21.2242 5.16466 20.8264 5.56248L11.3264 15.0625L7.32642 16.0625L8.32642 12.0625L17.8264 2.56248Z"
                                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('books.destroy', $i->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить эту книгу?')"
                                            class="poppins-semibold text-[1.71rem] cursor-pointer hover:text-[#656F77] transition-all duration-300">
                                            <svg class="w-[2.05rem] h-[2.05rem]" viewBox="0 0 21 23" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.37109 5.70288H3.37109H19.3711" stroke="#191D21" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M17.3711 5.70288V19.7029C17.3711 20.2333 17.1604 20.742 16.7853 21.1171C16.4102 21.4922 15.9015 21.7029 15.3711 21.7029H5.37109C4.84066 21.7029 4.33195 21.4922 3.95688 21.1171C3.58181 20.742 3.37109 20.2333 3.37109 19.7029V5.70288M6.37109 5.70288V3.70288C6.37109 3.17245 6.58181 2.66374 6.95688 2.28867C7.33195 1.91359 7.84066 1.70288 8.37109 1.70288H12.3711C12.9015 1.70288 13.4102 1.91359 13.7853 2.28867C14.1604 2.66374 14.3711 3.17245 14.3711 3.70288V5.70288"
                                                    stroke="#191D21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M8.37109 10.7029V16.7029" stroke="#191D21" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.3711 10.7029V16.7029" stroke="#191D21" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <a href="" class="flex items-center gap-3 raleway-semibold text-[1.2rem]">
                                    Читать далее
                                    <svg width="23" height="13" viewBox="0 0 23 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22.5406 7.03033C22.8335 6.73744 22.8335 6.26256 22.5406 5.96967L17.7676 1.1967C17.4747 0.903806 16.9998 0.903806 16.7069 1.1967C16.414 1.48959 16.414 1.96447 16.7069 2.25736L20.9496 6.5L16.7069 10.7426C16.414 11.0355 16.414 11.5104 16.7069 11.8033C16.9998 12.0962 17.4747 12.0962 17.7676 11.8033L22.5406 7.03033ZM-0.00976562 7.25H22.0102V5.75H-0.00976562V7.25Z"
                                            fill="black" />
                                    </svg>
                                </a>
                            @endif
                        @endauth
                    </div>
                @endforeach
            @endif
        </div>
    </section>
</x-layout>