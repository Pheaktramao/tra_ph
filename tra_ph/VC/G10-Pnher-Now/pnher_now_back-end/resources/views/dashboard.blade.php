<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">

                @php
                $roles = auth()->user()->roles->pluck('name')->toArray();
                @endphp

                @if (in_array('admin', $roles))
                <div class="container">

                    <!-- Dashboard -->
                    <div class="row flex flex-row m-5 justify-between">
                        <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg transition duration-300 ease-in-out hover:bg-gray:100 dark:hover:bg-green-800 transform hover:scale-105">
                            <div class="card-body flex flex-row items-center">
                                <div class="col-icon flex flex-row items-center bg-blue-600 h-37 px-4 py-3 rounded-lg">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <span class="material-icons-outlined" style="font-size:48px;color:white;">
                                            group
                                        </span>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0 mx-2">
                                    <div class="numbers">
                                        <p class="card-category">Users</p>
                                        <h4 class="card-title">{{$totalUsers}}+</h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-green-800 transform hover:scale-105">
                            <div class="card-body flex flex-row items-center">
                                <div class="col-icon flex flex-row items-center bg-blue-400 h-37 px-4 py-3 rounded-lg">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <span class="material-icons-outlined" style="font-size:48px;color:white;">
                                            store
                                        </span>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0 mx-2">
                                    <div class="numbers">
                                        <p class="card-category">Companies</p>
                                        <h4 class="card-title">{{$totalCompanies}}+</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-green-800 transform hover:scale-105">
                            <div class="card-body flex flex-row items-center">
                                <div class="col-icon flex flex-row items-center bg-red-500 h-37 px-4 py-3 rounded-lg">
                                    <div class="icon-big text-center bubble-shadow-small">
                                        <span class="material-icons-outlined" style="font-size:48px;color:white;">
                                            production_quantity_limits
                                        </span>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0 mx-2 ">
                                    <div class="numbers">
                                        <p class="card-category">Post</p>
                                        <h4 class="card-title">{{$totalBaggages}}+ </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg transition duration-300 ease-in-out hover:bg-gray-100 dark:hover:bg-green-800 transform hover:scale-105">
                            <div class="card-body flex flex-row items-center">
                                <div class="col-icon flex flex-row items-center bg-yellow-400 h-37 px-4 py-3 rounded-lg">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <span class="material-icons-outlined" style="font-size:48px;color:white;">
                                            check_circle
                                        </span>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0  mx-2">
                                    <div class="numbers">
                                        <p class="card-category">Feedbacks</p>
                                        <h4 class="card-title">{{$allFeedbacks}}+</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Dashboard -->
                </div>
                <!-- end Container -->
            </div>
            <!-- Chart -->
            <div class="cartInfo flex flex-row justify-between">
                <div class="card w-6/12 mx-1 p-2 bg-white rounded-lg">
                    <div class="card-header flex justify-center">
                        <h1 class="">Information of system</h1>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                <div class="card w-6/12 bg-white mx-1 p-2 rounded-lg">
                    <div class="card-header flex justify-center">
                        <h1 class="">Total of each months</h1>
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
            
            {{-- chart graph script  --}}
            <script>
                var totalBaggags = <?php echo $totalBaggages; ?>;
                var totalUsers = <?php echo $totalUsers; ?>;
                var totalCompanies = <?php echo $totalCompanies; ?>;
                var allFeedbacks = <?php echo $allFeedbacks; ?>;
                var ctx = document.getElementById('barChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Users', 'Companies', 'Posts', 'Feedbacks'],
                        datasets: [{
                            data: [totalUsers, totalCompanies, totalBaggags, allFeedbacks],
                            backgroundColor: [
                                '#2563EB',
                                '#EE0943',
                                '#EF4444',
                                '#FBBF24',
                            ],
                        }],
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        if (value % 1 === 0) {
                                            return value
                                        }
                                    }
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    },
                    toolbar: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ':' + tooltipItem.position;
                            }
                        }
                    }
                });
            </script>

            <!-- Line Chart -->
            <script>
                
                var ctx = document.getElementById("lineChart").getContext('2d');
                var lineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                                label: 'User',
                                data: [20, 10, 5, 5, 8, 20, 12, 20, 16, 20, 4, 20, 12],
                                fill: false,
                                borderColor: '#2563EB',
                                backgroundColor: '#2563EB',
                                borderWidth: 1
                            },
                            {
                                label: 'Companies',
                                data: [20, 10, 5, 5, 20, 20, 14, 20, 20, 19, 30, 20, 20],
                                fill: false,
                                borderColor: '#EF4444',
                                backgroundColor: '#EF4444',
                                borderWidth: 1
                            },
                            {
                                label: 'Posts',
                                data: [4, 10, 5, 5, 1, 10, 20, 8, 26, 20, 17, 2, 6],
                                fill: false,
                                borderColor: '#FBBF24',
                                backgroundColor: '#FBBF24',
                                borderWidth: 1
                            },
                            {
                                label: 'Feedback',
                                data: [20, 10, 5, 5, 20, 21, 15, 20, 20, 18, 23, 30, 20],
                                fill: false,
                                borderColor: '#EE0943',
                                backgroundColor: '#EE0943',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: false
                        }
                    }
                });

                // });
            </script>
            @elseif(in_array('supervisor', $roles))
            <div class="flex">
                <div class="flex-col w-full">
                    <!-- Container -->
                    <div class="container mb-7">
                        <!-- Dashboard -->
                        <div class="row flex flex-row m-5 justify-between">
                            <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg">
                                <div class="card-body flex flex-row items-center">
                                    <a href="{{ route('admin.supervisor.list_delivery') }}" class="col-icon flex flex-row items-center">
                                        <div class="col-icon flex flex-row items-center bg-blue-600 h-37 px-4 py-3 rounded-lg">
                                            <svg class="h-16 w-16 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <circle cx="7" cy="17" r="2" />
                                                <circle cx="17" cy="17" r="2" />
                                                <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                                <line x1="3" y1="9" x2="7" y2="9" />
                                            </svg>
                                        </div>

                                        <div class="col col-stats ms-3 ms-sm-0 mx-2">
                                            <div class="numbers">
                                                <p class="card-category">List Delivery</p>
                                                <h4 class="card-title">1,294</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg">
                                <div class="card-body flex flex-row items-center">
                                    <a href="{{ route('admin.supervisor.list_instock') }}" class="col-icon flex flex-row justify-center items-center">
                                        <div class="col-icon flex flex-row items-center bg-blue-400 h-37 px-4 py-3 rounded-lg">
                                            <svg class="h-16 w-16 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="16.5" y1="9.4" x2="7.5" y2="4.21" />
                                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                                                <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                                                <line x1="12" y1="22.08" x2="12" y2="12" />
                                            </svg>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0 mx-2">
                                            <div class="numbers">
                                                <p class="card-category">In Stock</p>
                                                <h4 class="card-title">1,294</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg">
                                <div class="card-body flex flex-row items-center">
                                    <a href="{{ route('admin.supervisor.item_detail') }}" class="col-icon flex flex-row justify-center items-center">
                                        <div class="col-icon flex flex-row items-center bg-red-500 h-37 px-4 py-3 rounded-lg">
                                            <svg class="h-16 w-16 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" />
                                                <line x1="9" y1="7" x2="13" y2="7" />
                                                <line x1="9" y1="11" x2="13" y2="11" />
                                            </svg>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0 mx-2">
                                            <div class="numbers">
                                                <p class="card-category">Item detail</p>
                                                <h4 class="card-title">1,294</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="card card-stats card-round bg-white w-1/3 px-2 py-2 m-2 rounded-lg">
                                <div class="card-body flex flex-row items-center">
                                    <div class="col-icon flex flex-row items-center bg-yellow-400 h-37 px-4 py-3 rounded-lg">
                                        <svg class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0  mx-2">
                                        <div class="numbers">
                                            <p class="card-category">Delivery</p>
                                            <h4 class="card-title">1,294</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Dashboard -->
                    </div>
                    <div class="board flex justify-between ml-5">
                        <div class="card card-stats card-round bg-white w-2/4 h-70 px-2 py-2 m-2 rounded-lg flex justify-self-center">
                            <img src="https://png.pngtree.com/png-clipart/20211026/original/pngtree-cartoon-delivery-man-png-image_876933.png" alt="" class=" w-1/2 ml-20">
                        </div>
                        <div class="card card-stats card-round bg-white w-2/4 px-2 py-2 m-2 rounded-lg mr-12 ml-3">
                            {{-- chart graph --}}

                            <div class="card-body">
                                <canvas id="barChart"></canvas>
                            </div>

                        </div>

                    </div>
                    <div class="container-table mt-6 w-full">
                        <div class="p-3">
                            <h1 class="text-2xl ml-3">New Information</h1>
                        </div>
                        <table class="ml-5 mr-4">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User</th>
                                    <th class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type</th>
                                    <th class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        From</th>
                                    <th class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Phone Sender</th>
                                    <th class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Phone Reciever</th>
                                    <th class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Branch</th>
                                    <th class="px-12 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Active</th>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        Narith
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Fruit
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Kompong Cham
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm">
                                        086343092
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        079573972
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm text-gray-500">
                                        BFC
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="text-blue-400">Edit</span>
                                        <span class="text-red-400">Red</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        Narith
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Fruit
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Kompong Cham
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm">
                                        086343092
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        079573972
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm text-gray-500">
                                        BFC
                                    </td>
                                    <td class="px-12 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="text-blue-400">Edit</span>
                                        <span class="text-red-400">Red</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Container -->
                </div>
            </div>
            <script>
                //Supervisor
                var ctx = document.getElementById('barChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Monday', 'Tuesday', 'Wendesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                        datasets: [{
                            label: 'Sales',
                            data: [12, 19, 14, 9, 10, 13, 10],
                            backgroundColor: [
                                'rgba(255, 99, 132, 10)',
                                'rgba(54, 162, 235, 10)',
                                'rgba(255, 206, 86, 10)',
                                'rgba(75, 192, 192, 10)',
                                'rgba(153, 102, 255, 10)',
                                'rgba(255, 159, 64, 10)',
                                'rgba(255, 159, 109, 10)',
                            ]
                        }]
                    }
                });
            </script>
            @endif
        </main>
    </div>
</x-app-layout>