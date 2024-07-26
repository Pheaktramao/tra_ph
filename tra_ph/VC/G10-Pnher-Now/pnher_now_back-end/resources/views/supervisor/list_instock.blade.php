<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                <div class="flex">
                    <div class="flex-col w-3/4">
                        <!-- Container -->
                        <div class="container mb-7">
                            <!-- Dashboard -->
                            <div class="row flex flex-row justify-self-start mr-10">
                                <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg">
                                    <div class="card-body flex flex-row items-center">
                                        <a href="{{ route('supervisor.delivery_list') }}"
                                            class="col-icon flex flex-row items-center">
                                            <div
                                                class="col-icon flex flex-row items-center  bg-yellow-500 h-37 px-6 py-3 rounded-lg">
                                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                    <span class="material-icons-outlined"
                                                        style="font-size:50px ;color:white;">
                                                        <i class="fas fa-shipping-fast w-57"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0 mx-2">
                                                <div class="numbers">
                                                    <p class="card-category ml-4">List Delivery</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg">
                                    <div class="card-body flex flex-row items-center">
                                        <a href="{{ route('supervisor.list_instock') }}"
                                            class="col-icon flex flex-row items-center">
                                            <div
                                                class="col-icon flex flex-row items-center  bg-yellow-500 h-37 px-8 py-3 rounded-lg">
                                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                    <span class="material-icons-outlined"
                                                        style="font-size:50px ;color:white;">
                                                        <i class="fas fa-file-alt w-57"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0 mx-2">
                                                <div class="numbers">
                                                    <p class="card-category ml-4">List Instock</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg">
                                    <div class="card-body flex flex-row items-center">
                                        <a href="{{ route('supervisor.item_detail') }}"
                                            class="col-icon flex flex-row items-center">
                                            <div
                                                class="col-icon flex flex-row items-center bg-yellow-500 h-37 px-8 py-3 rounded-lg">
                                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                    <span class="material-icons-outlined"
                                                        style="font-size:50px ;color:white;">
                                                        <i class="fas fa-shopping-bag w-57"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0 mx-2">
                                                <div class="numbers">
                                                    <p class="card-category ml-4">Item Detail</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end Dashboard -->
                        </div>
                        <div class="container-table mt-5 w-full">
                            <div class="p-3 ml-0">
                                <h1 class="text-2xl">List Instock</h1>
                            </div>
                            <table class="ml-2">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            User</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Type</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            From</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            To</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Phone Sender</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Phone Reciever</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Branch</th>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            Narith
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Fruit
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Kompong Cham
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Phom Penh
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            086343092
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            079573972
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            BFC
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            Narith
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Fruit
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Kompong Cham
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Phom Penh
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            086343092
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            079573972
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            BFC
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
