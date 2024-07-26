<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 my-1 mx-1">
            <div class="container mx-auto px-2 py-2">
                <div class="text-right flex flex-row justify-between items-end">
                    @can('User create')
                    <a href="{{route('admin.users.create')}}" type="button" class="flex flex-row justify-between items-center px-5 py-1 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-500 text-white font-extrabold text-lg rounded shadow-2xl hover:from-blue-600 hover:via-blue-700 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-70 active:bg-red-800 active:shadow-inner transform hover:scale-110 transition duration-500 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed m-4 ml-auto">
                        <span class="material-icons-outlined">
                            add
                        </span>
                        New User
                    </a>
                    @endcan
                </div>
                <div class="bg-white shadow-md rounded">
                    <table class="text-left w-full border-collapse my-auto">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                    User Name</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                    Role</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('User access')
                            @foreach ($users as $user)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->first_name }}
                                    {{ $user->last_name }}
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    @foreach ($user->roles as $role)
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light text-right">
                                    @can('User edit')
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-green-500">
                                        <span class="material-icons-outlined">
                                            border_color
                                        </span>
                                    </a>
                                    @endcan
                                    <a href="" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-red-400">
                                        <span class="material-icons-outlined">
                                            delete
                                        </span>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                            @endcan

                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
</x-app-layout>