<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 my-1 mx-1">
        <div class="container mx-auto px-2 py-2">
            <div data-modal-target="default-modal" data-modal-toggle="default-modal" class="text-right flex flex-row justify-between items-end">
                @can('Company create')
                <a href="{{route('admin.company.create')}}" type="button" class="flex flex-row justify-between items-center px-5 py-1 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-500 text-white font-extrabold text-lg rounded shadow-2xl hover:from-blue-600 hover:via-blue-700 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-70 active:bg-red-800 active:shadow-inner transform hover:scale-110 transition duration-500 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed m-4 ml-auto">
                    <span class="material-icons-outlined">
                        add
                    </span>
                    New Company
                </a>
                @endcan
            </div>
            <div class="bg-white shadow-md rounded">
                <table class="text-left w-full border-collapse my-auto">
                    <thead>
                        <tr>
                            <th class="py-4 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Company Name</th>
                            <th class="py-4 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-3/12">Address</th>
                            <th class="py-4 px-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-4/12">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @can('Company access')
                        @foreach($company as $company)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{$company->name}}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{$company->address}}</td>
                            <td class="py-4 px-6 border-b border-grey-light text-right">
                                @can('Company edit')
                                <a href="{{route('admin.company.edit', $company->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-green-400">
                                    <span class="material-icons-outlined">
                                        border_color
                                    </span>
                                </a>
                                @endcan

                                @can('Company delete')
                                <form action="{{ route('admin.company.destroy', $company->id)}}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">
                                        <span class="material-icons-outlined">
                                            delete
                                        </span>
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                        @endcan
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-app-layout>

