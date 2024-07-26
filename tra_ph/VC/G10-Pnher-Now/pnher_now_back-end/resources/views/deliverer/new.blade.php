<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.deliverer.store') }}">
                        @csrf
                        <div class="flex flex-col space-y-2">
                            <label for="first_name" class="text-gray-700 select-none font-medium">First Name</label>
                            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}"
                                placeholder="First Name"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="last_name" class="text-gray-700 select-none font-medium">Last Name</label>
                            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}"
                                placeholder="Last Name"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                placeholder="Email"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="password" class="text-gray-700 select-none font-medium">Password</label>
                            <input id="password" type="password" name="password" value="{{ old('password') }}"
                                placeholder="Password"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="branch" class="text-gray-700 select-none font-medium">Branch</label>
                            <select id="branch" name="branch_id"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="role" class="text-gray-700 select-none font-medium">Role</label>
                            <select id="role" name="role_id"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center mt-10 mb-10">
                            <button type="submit"
                                class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
