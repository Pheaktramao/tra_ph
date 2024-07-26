<x-app-layout>
    <div>
        <main class="flex-1 mt-2 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container px-4 py-1 pb-10 flex justify-center rounded-xl">
                <div class="bg-white shadow-md rounded my-3 p-3 w-full">
                    <div class="modal-dialog" id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="flex justify-end">
                            <a href="{{route('admin.company.index')}}">
                                <span data-modal-hide="popup-modal" class="material-icons-outlined bg-red-300 p-2 rounded-full hover:text-red-500 mt-3">
                                    close
                                </span>
                            </a>
                        </div>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title flex justify-center text-3xl" id="popupFormModalLabel">Create New Company</h5>
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                            </div>
                            <div class="modal-body mt-5">
                                <form method="POST" action="{{ route('admin.company.store')}}">
                                    @csrf
                                    <div class="flex flex-col space-y-2">
                                        <label for="title" class="text-gray-700 select-none font-medium">Company</label>
                                        <input id="title" type="text" name="name" placeholder="Enter Company Name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                    </div>

                                    <div class="flex flex-col space-y-2">
                                        <label for="description" class="text-gray-700 select-none font-medium">Address</label>
                                        <input id="address" type="text" name="address" placeholder="Enter address" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />

                                    </div>

                                    <div class="modal-footer text-right mt-5 flex flex-row">
                                        <!-- <button href="{{route('admin.company.index') }}" type="submit" class="flex items-end px-4 py-2 bg-gradient-to-r from-red-500 via-red-600 to-red-500 text-white font-extrabold text-lg rounded-full shadow-2xl hover:from-red-600 hover:via-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 focus:ring-opacity-70 active:bg-red-800 active:shadow-inner transform hover:scale-110 transition duration-500 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed">Back</button> -->
                                        <button data-modal-hide="popup-modal" type="submit" class="flex flex-row justify-between items-center px-5 py-1 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-500 text-white font-extrabold text-lg rounded shadow-2xl hover:from-blue-600 hover:via-blue-700 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-70 active:bg-red-800 active:shadow-inner transform hover:scale-110 transition duration-500 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed m-4 ml-auto">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>

