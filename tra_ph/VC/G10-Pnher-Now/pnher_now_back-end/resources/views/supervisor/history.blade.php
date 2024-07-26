<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-9 py-8">
                <div class="flex">
                    <div class="flex-col w-3/4">
                        <div class="container-table w-full">
                            <div class="p-3">
                                <h1 class="text-2xl">History of Delivery</h1>
                            </div>
                            <table class="ml-1">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            User</th>
                                        <th
                                            class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Type</th>
                                        <th
                                            class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            From</th>
                                        <th
                                            class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            To</th>
                                        <th
                                            class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Sender</th>
                                        <th
                                            class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Reciever</th>
                                        <th
                                            class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action</th>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            Narith
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Fruit
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Kompong Cham
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Phnom Penh
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm">
                                            086343092
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            079573972
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span class="text-red-400">Delete</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            Narith
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Fruit
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Kompong Cham
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Phnom Penh
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm">
                                            086343092
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            079573972
                                        </td>
                                        <td class="px-7 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span class="text-red-400">Delete</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Container -->
                    </div>
                    <div class="w-1/4 bg-white h-screen rounded-l-lg">
                        <div class="flex">
                            <div class="flex-grow p-4 grid grid-row-3 gap-4 mr-px">
                                <div class="bg-white rounded-lg shadow-md p-3 px-3 flex gap-8">
                                    <div
                                        class="col-icon flex flex-row items-center bg-yellow-400 h-30 px-3 py-3 rounded-lg">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <p class="text-2xl font-bold text-white">+90</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="text-lg font-bold">Exports</h2>
                                        <div class="flex mt-3 gap-2">
                                            <p class="text-green-500"> <i class='fas fa-arrow-up'></i></p>
                                            <p class="text-gray-500">10%</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-3 px-3 flex gap-8">
                                    <div
                                        class="col-icon flex flex-row items-center bg-green-600 h-30 px-3 py-3 rounded-lg">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <p class="text-2xl font-bold text-white">+90</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="text-lg font-bold">Activity</h2>
                                        <div class="flex mt-3 gap-2">
                                            <p class="text-green-500"> <i class='fas fa-arrow-up'></i></p>
                                            <p class="text-gray-500">10%</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-3 px-3 flex gap-8">
                                    <div
                                        class="col-icon flex flex-row items-center bg-red-700 h-30 px-3 py-3 rounded-lg">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <p class="text-2xl font-bold text-white">+90</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="text-lg font-bold">Instock</h2>
                                        <div class="flex mt-3 gap-2">
                                            <p class="text-green-500"> <i class='fas fa-arrow-up'></i></p>
                                            <p class="text-gray-500">10%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
</x-app-layout>
