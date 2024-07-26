<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-4 py-1 pb-10">
        <div class="bg-white shadow-md rounded my-3 p-3">
          <form method="POST" action="{{ route('admin.permissions.store')}}">
            <div class="flex justify-end">
              <a href="{{route('admin.users.index')}}">
                <span class="material-icons-outlined bg-red-300 p-2 rounded-full hover:text-red-500">
                  close
                </span>
              </a>
            </div>
            @csrf
            @method('post')
            <div class="flex flex-col space-y-2">
              <label for="role_name" class="text-gray-700 select-none font-medium">Permission Name</label>
              <input id="role_name" type="text" name="name" value="{{ old('name') }}" placeholder="Enter permission" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            <div class="text-center mt-16">
              <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Submit</button>
            </div>
        </div>
      </div>
    </main>
  </div>
  </div>
</x-app-layout>