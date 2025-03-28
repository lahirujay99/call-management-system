{{--<x-app-layout>--}}

{{--    <div class="bg-white p-4 rounded-lg shadow-md mx-auto max-w-2xl my-5">--}}


{{--        <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Branch</h2>--}}
{{--        <hr class="border-b border-gray-200 mb-6">--}}

{{--        @if (session('success'))--}}
{{--            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">--}}
{{--                <strong class="font-bold">Success!</strong>--}}
{{--                <span class="block sm:inline">{{ session('success') }}</span>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        @if ($errors->any())--}}
{{--            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">--}}
{{--                <strong class="font-bold">Error!</strong>--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li><span class="block sm:inline">{{ $error }}</span></li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form action="{{ route('branches.store') }}" method="POST" class="space-y-6">--}}
{{--            @csrf--}}


{{--            <h3 class="text-lg font-medium text-gray-700 mb-4">Branch Details</h3>--}}

{{--            --}}{{-- Branch Name Input Row --}}
{{--            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">--}}
{{--                <label for="name"--}}
{{--                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">--}}
{{--                    Branch Name--}}
{{--                </label>--}}
{{--                <div class="border-l border-gray-300">--}}
{{--                    <input type="text" id="name" name="name"--}}
{{--                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none rounded-r-md bg-white focus:outline-none">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            --}}{{-- Save Button --}}
{{--            <div class="mt-6 w-2/5 mx-auto">--}}
{{--                <button type="submit"--}}
{{--                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-medium rounded-md text-[#F9F7F7] bg-[#112D4E] hover:bg-[#3F72AF] w-full">--}}
{{--                    Save--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="bg-white p-4 rounded-lg shadow-md mx-auto max-w-2xl my-5">

                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Branch</h2>
                        <hr class="border-b border-gray-200 mb-6">

                        @if (session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                                 role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                 role="alert">
                                <strong class="font-bold">Error!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><span class="block sm:inline">{{ $error }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('branches.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <h3 class="text-lg font-medium text-gray-700 mb-4">Branch Details</h3>

                            {{-- Branch Name Input Row --}}
                            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                                <label for="name"
                                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                                    Branch Name
                                </label>
                                <div class="border-l border-gray-300">
                                    <input type="text" id="name" name="name"
                                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none rounded-r-md bg-white focus:outline-none">
                                </div>
                            </div>

                            {{-- Save Button --}}
                            <div class="mt-6 w-2/5 mx-auto">
                                <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-medium rounded-md text-[#F9F7F7] bg-[#112D4E] hover:bg-[#3F72AF] w-full">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="bg-white p-4 rounded-lg shadow-md mx-auto max-w-3xl my-5">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Existing Branches</h2>
                        <hr class="border-b border-gray-200 mb-6">

                        <div class="mb-4">
                            <form action="{{ route('branches.index') }}" method="GET">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input type="search" id="default-search" name="search" value="{{ $search ?? '' }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Branch name..." >
                                </div>
                            </form>
                        </div>


                        <div class="overflow-x-auto shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200 table-auto">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created At
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($branches as $branch)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $branch->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $branch->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button data-branch-id="{{ $branch->id }}" class="edit-branch-btn text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                                            <button data-branch-id="{{ $branch->id }}" class="delete-branch-btn text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" colspan="3">No branches available</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $branches->links() }} {{-- Pagination links --}}
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>


</x-app-layout>
