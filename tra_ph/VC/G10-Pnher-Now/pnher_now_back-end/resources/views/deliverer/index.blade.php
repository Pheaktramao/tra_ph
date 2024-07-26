<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="pt-3 text-2xl">
                    <h1 class="text-1xl font-bold">Driver Information</h1>
                </div>
                <div class="text-right">
                    @can('Deliverer create')
                        <a href="{{ route('admin.deliverer.create') }}"
                            class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">
                            New Driver
                        </a>
                    @endcan
                </div>

                <div class="bg-white shadow-md rounded my-6">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Branch Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    First Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Last name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('Deliverer access')
                                @foreach ($deliverers as $deliverer)
<<<<<<< HEAD
                                    @foreach ($branches as $branch)
                                        @if ($deliverer->branch->name == $branch->name)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4 text-center">

                                                    {{ $deliverer->branch->name }}
                                                </td>
                                                <td class="px-6 py-4 text-center">

                                                    {{ $deliverer->user->first_name }}
                                                </td>
                                                <td class="px-6 py-4 text-center">

                                                    {{ $deliverer->user->last_name }}
                                                </td>
                                                <td class="px-6 py-4 text-center">

                                                    {{ $deliverer->user->email }}
                                                </td>

                                                <td class="px-6 py-4 text-center">
                                                    @can('Deliverer delete')
                                                        <form action="{{ route('admin.deliverer.destroy', $deliverer->id) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                class="bg-red-500 text-white font-bold px-4 py-1 rounded focus:outline-none shadow transition-colors">Delete</button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
=======
                                    @if ($deliverer->branch && $deliverer->branch->name)
                                        @foreach ($branches as $branch)
                                            @if ($deliverer->branch->name == $branch->name)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4 text-center">

                                                        {{ $deliverer->branch->name }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">

                                                        {{ $deliverer->user->first_name }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">

                                                        {{ $deliverer->user->last_name }}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">

                                                        {{ $deliverer->user->email }}
                                                    </td>

                                                    <td class="px-6 py-4 text-center">
                                                        @can('Deliverer delete')
                                                            <form
                                                                action="{{ route('admin.deliverer.destroy', $deliverer->id) }}"
                                                                method="POST" class="inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button
                                                                    class="bg-red-500 text-white font-bold px-4 py-1 rounded focus:outline-none shadow transition-colors">Delete</button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
>>>>>>> user_feedback
                                @endforeach
                            @endcan
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    </div>
</x-app-layout>
