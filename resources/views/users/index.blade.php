<x-layout>
    <div class="flex flex-col bg-[#CBE3FF] gap-10 w-full h-full min-h-[70dvh] max-w-[90%] p-[3.16rem] mt-[14rem] rounded-[4px]">
        <div class="flex items-center justify-between">
            <div class="relative">
                <img src="{{ asset('/img/icons/search.png') }}" alt="search" class="absolute left-[2.14rem] top-1/2 transform -translate-y-1/2 z-10 w-[1.71rem] h-[1.71rem]" />
                <input type="search" placeholder="Поиск..."class="bg-white border poppins-medium border-solid text-[1.54rem] p-[1.5rem] pl-[5.22rem] border-[#ACB8C2] rounded-[4px] w-[61.1rem] h-[4.28rem]">
            </div>
            <a href="{{ route('users.create') }}" class="text-[1.54rem] font-semibold text-white bg-[#191D21] rounded-[4px] px-[1.5rem] py-[1.2rem] transition-all duration-300 hover:bg-white hover:text-[#191D21]">Создать пользователя</a>
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
                @foreach($users as $user)
                    <tr class="border-b border-b-solid border-b-[#191D21]">
                        <td class="py-[1.5rem] text-[1.37rem] px-[2.99rem]">{{ $user->id }}</td>
                        <td class="py-[1.5rem] text-[1.37rem]">{{ $user->name }}</td>
                        <td class="py-[1.5rem] text-[1.37rem]">{{ $user->email }}</td>
                        <td class="py-[1.5rem] text-[1.37rem]">{{ $user->role }}</td>
                        <td class="py-[1.5rem] text-[1.37rem]">{{ $user->registration_date }}</td>
                        <td class="py-[1.5rem] text-[1.37rem]">
                            <div class="flex items-center gap-[1.71rem]">
                                <a href="{{ route('users.edit', $user->id) }}" class="transition-all duration-300 hover:opacity-50">
                                    <svg class="w-[2.14rem] h-[2.14rem]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.2" d="M10.625 5L15 9.375L17.0581 7.31694C17.1753 7.19973 17.2411 7.04076 17.2411 6.875C17.2411 6.70924 17.1753 6.55027 17.0581 6.43306L13.5669 2.94194C13.4497 2.82473 13.2908 2.75888 13.125 2.75888C12.9592 2.75888 12.8003 2.82473 12.6831 2.94194L10.625 5Z" fill="#191D21" />
                                        <path d="M10.625 5L15 9.375" stroke="#191D21" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.5 16.875H3.75C3.58424 16.875 3.42527 16.8092 3.30806 16.6919C3.19085 16.5747 3.125 16.4158 3.125 16.25V12.7589C3.125 12.6768 3.14117 12.5955 3.17258 12.5197C3.20398 12.4439 3.25002 12.375 3.30806 12.3169L12.6831 2.94194C12.8003 2.82473 12.9592 2.75888 13.125 2.75888C13.2908 2.75888 13.4497 2.82473 13.5669 2.94194L17.0581 6.43306C17.1753 6.55027 17.2411 6.70924 17.2411 6.875C17.2411 7.04076 17.1753 7.19973 17.0581 7.31694L7.5 16.875Z" stroke="#191D21" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')" class="cursor-pointer transition-all duration-300 hover:opacity-50">
                                        <svg class="w-[2.14rem] h-[2.14rem] -mb-[.65rem]" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.2" d="M16.25 3.125H3.75C3.40482 3.125 3.125 3.40482 3.125 3.75V16.25C3.125 16.5952 3.40482 16.875 3.75 16.875H16.25C16.5952 16.875 16.875 16.5952 16.875 16.25V3.75C16.875 3.40482 16.5952 3.125 16.25 3.125Z" fill="#191D21"/>
                                            <path d="M12.5 7.5L7.5 12.5" stroke="#191D21" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.5 12.5L7.5 7.5" stroke="#191D21" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.25 3.125H3.75C3.40482 3.125 3.125 3.40482 3.125 3.75V16.25C3.125 16.5952 3.40482 16.875 3.75 16.875H16.25C16.5952 16.875 16.875 16.5952 16.875 16.25V3.75C16.875 3.40482 16.5952 3.125 16.25 3.125Z" stroke="#191D21" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-layout>