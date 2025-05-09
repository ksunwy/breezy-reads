<x-layout>
    <div
        class="flex flex-col bg-[#CBE3FF] gap-10 w-full h-full min-h-[70dvh] max-w-[90%] p-[3.16rem] mt-[14rem] rounded-[4px]">
        <div class="flex items-center justify-between">
            <form method="GET" action="{{ route('users.index') }}" class="relative">
                <img src="{{ asset('/img/icons/search.png') }}" alt="search"
                    class="absolute left-[2.14rem] top-1/2 transform -translate-y-1/2 z-10 w-[1.71rem] h-[1.71rem]" />
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Поиск..."
                    class="bg-white border poppins-medium border-solid text-[1.54rem] p-[1.5rem] pl-[5.22rem] border-[#ACB8C2] rounded-[4px] w-[61.1rem] h-[4.28rem]">
            </form>
            @auth
                @if(auth()->user() && auth()->user()->role === 'Администратор')
                    <a href="{{ route('users.create') }}"
                        class="text-[1.54rem] font-semibold text-white bg-[#191D21] rounded-[4px] px-[1.5rem] py-[1.2rem] transition-all duration-300 hover:bg-white hover:text-[#191D21]">Создать
                        пользователя</a>
                @else
                    <div class=""></div>
                @endif
            @endauth
        </div>
        <div class="max-h-[60dvh] overflow-y-auto">
            <table class="w-full">
                <tr class="poppins-bold text-[1.71rem] text-left">
                    <th class="px-[2.99rem]">ID</th>
                    <th>Имя</th>
                    <th>Почта</th>
                    <th>Роль</th>
                    <th>Дата регистрации</th>
                    <th></th>
                </tr>
                @if($users->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center py-4 text-[1.54rem]">Пользователи не найдены.</td>
                    </tr>
                @else
                    @foreach($users as $user)
                        <tr onclick="window.location='{{ url('/user/' . $user->id) }}'"
                            class="border-b border-b-solid border-b-[#191D21]">
                            <td class="py-[1.5rem] text-[1.37rem] px-[2.99rem]">{{ $user->id }}</td>
                            <td class="py-[1.5rem] text-[1.37rem]">{{ $user->name }}</td>
                            <td class="py-[1.5rem] text-[1.37rem]">{{ $user->email }}</td>
                            <td class="py-[1.5rem] text-[1.37rem]">{{ $user->role }}</td>
                            <td class="py-[1.5rem] text-[1.37rem]">{{ $user->registration_date }}</td>
                            <td class="py-[1.5rem] text-[1.37rem]">
                                @auth
                                    @if(auth()->user() && auth()->user()->role === 'Администратор')
                                        <div class="flex items-center gap-[1.71rem]">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="transition-all duration-300 hover:opacity-50">
                                                <svg class="w-[1.71rem] h-[1.71rem]" viewBox="0 0 23 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3264 4.0625H3.32642C2.79598 4.0625 2.28728 4.27321 1.9122 4.64829C1.53713 5.02336 1.32642 5.53207 1.32642 6.0625V20.0625C1.32642 20.5929 1.53713 21.1016 1.9122 21.4767C2.28728 21.8518 2.79598 22.0625 3.32642 22.0625H17.3264C17.8568 22.0625 18.3656 21.8518 18.7406 21.4767C19.1157 21.1016 19.3264 20.5929 19.3264 20.0625V13.0625"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M17.8264 2.56248C18.2242 2.16466 18.7638 1.94116 19.3264 1.94116C19.889 1.94116 20.4286 2.16466 20.8264 2.56248C21.2242 2.96031 21.4477 3.49987 21.4477 4.06248C21.4477 4.62509 21.2242 5.16466 20.8264 5.56248L11.3264 15.0625L7.32642 16.0625L8.32642 12.0625L17.8264 2.56248Z"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')"
                                                    class="cursor-pointer transition-all duration-300 hover:opacity-50">
                                                    <svg class="w-[1.71rem] h-[1.71rem] -mb-[.4rem]" viewBox="0 0 21 23" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.37109 5.70288H3.37109H19.3711" stroke="#191D21" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M17.3711 5.70288V19.7029C17.3711 20.2333 17.1604 20.742 16.7853 21.1171C16.4102 21.4922 15.9015 21.7029 15.3711 21.7029H5.37109C4.84066 21.7029 4.33195 21.4922 3.95688 21.1171C3.58181 20.742 3.37109 20.2333 3.37109 19.7029V5.70288M6.37109 5.70288V3.70288C6.37109 3.17245 6.58181 2.66374 6.95688 2.28867C7.33195 1.91359 7.84066 1.70288 8.37109 1.70288H12.3711C12.9015 1.70288 13.4102 1.91359 13.7853 2.28867C14.1604 2.66374 14.3711 3.17245 14.3711 3.70288V5.70288"
                                                            stroke="#191D21" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M8.37109 10.7029V16.7029" stroke="#191D21" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M12.3711 10.7029V16.7029" stroke="#191D21" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class=""></div>
                                    @endif
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
</x-layout>