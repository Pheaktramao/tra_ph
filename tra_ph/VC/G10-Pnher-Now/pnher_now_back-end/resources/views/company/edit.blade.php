<x-app-layout>
    <div>
        <main class="flex-1 mt-2 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container  px-4 py-1 pb-16 flex justify-center rounded-xl">
                <div class="bg-white shadow-md rounded my-6 p-5 w-5/12">
                    <div class="modal-dialog" id="popupFormModal" tabindex="-1" aria-labelledby="popupFormModalLabel" aria-hidden="true">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title flex justify-center text-3xl" id="popupFormModalLabel">Edit Company</h5>
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                            </div>
                            <div class="modal-body mt-10">
                                <form method="POST" action="{{ route('admin.company.update', $company->id)}}">
                                    @csrf
                                    @method('put')
                                    <div class="flex flex-col space-y-2">
                                        <label for="title" class="text-gray-700 select-none font-medium">Company</label>
                                        <input id="title" type="text" name="name" placeholder="Enter Company Name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" value="{{old('name', $company->name)}}" />
                                    </div>

                                    <div class="flex flex-col space-y-2">
                                        <label for="description" class="text-gray-700 select-none font-medium">Address</label>
                                        <input id="address" type="text" name="address" placeholder="Enter address" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" value="{{old('address', $company->address)}}" />

                                    </div>

                                    <div class="modal-footer text-right mt-16 mb-16 flex flex-row">
                                        <button href="{{route('admin.company.index') }}" type="submit" class="flex flex-row justify-between items-center px-5 py-1 bg-gradient-to-r from-red-500 via-red-600 to-red-500 text-white font-extrabold text-lg rounded shadow-2xl hover:from-red-600 hover:via-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 focus:ring-opacity-70 active:bg-red-800 active:shadow-inner transform hover:scale-110 transition duration-500 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed mt-2">Back</button>
                                        <button type="submit" class="flex flex-row justify-between items-center px-5 py-1 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-500 text-white font-extrabold text-lg rounded shadow-2xl hover:from-blue-600 hover:via-blue-700 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-70 active:bg-red-800 active:shadow-inner transform hover:scale-110 transition duration-500 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed mt-2 ml-auto">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <div class="modal-dialog" id="popupFormModal" tabindex="-1" aria-labelledby="popupFormModalLabel" aria-hidden="true">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title flex justify-center text-3xl" id="popupFormModalLabel">Edit Company</h5>
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                <div class="modal-body mt-10">
                                    <form method="POST" action="{{ route('admin.company.update', $company->id)}}">
                                        @csrf
                                        @method('put')
                                        <div class="flex flex-col space-y-2">
                                            <label for="title" class="text-gray-700 select-none font-medium">Company</label>
                                            <input id="title" type="text" name="name" placeholder="Enter Company Name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" value="{{old('name', $company->name)}}"/>
                                        </div>

                                        <div class="flex flex-col space-y-2">
                                            <label for="description" class="text-gray-700 select-none font-medium">Address</label>
                                            <input id="address" type="text" name="address" placeholder="Enter address" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" value="{{old('address', $company->address)}}"/>

                                        </div>

                                        <div class="modal-footer text-right mt-16 mb-16 flex flex-row">
                                            <button href="{{route('admin.company.index') }}" type="submit" class="flex items-end px-4 py-2 bg-gradient-to-r from-red-500 via-red-600 to-red-500 text-white font-extrabold text-lg rounded-full shadow-2xl hover:from-red-600 hover:via-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 focus:ring-opacity-70 active:bg-red-800 active:shadow-inner transform hover:scale-110 transition duration-500 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed">Back</button>
                                            <button type="submit" class="flex items-end px-4 py-2 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-500 text-white font-extrabold text-lg rounded-full shadow-2xl hover:from-blue-600 hover:via-blue-700 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-70 active:bg-blue-800 active:shadow-inner transform hover:scale-110 transition duration-500 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed ml-auto">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>yy
