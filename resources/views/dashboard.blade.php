<x-app-layout>

    <div class="bg-cyan-950 rounded-3xl shadow-md overflow-hidden mx-auto max-w-6xl mt-7"> {{-- Main OUTER Container (Gray) --}}
        <div class="px-4 py-3 border-gray-300 flex items-center space-x-4 bg-cyan-950 rounded-t-lg"> {{-- Filters & Search Area (within Outer Gray) --}}
            <div class="relative inline-block text-left">
                <div>
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 rounded-2xl shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500" id="branch-menu-button" aria-expanded="false" aria-haspopup="true">
                        Branch
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="hidden origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="branch-menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="branch-menu-item-0">Option 1</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="branch-menu-item-1">Option 2</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="branch-menu-item-2">Option 3</a>
                    </div>
                </div>
            </div>

            <div class="relative inline-block text-left">
                <div>
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 rounded-2xl shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500" id="designation-menu-button" aria-expanded="false" aria-haspopup="true">
                        Designation
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="hidden origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="designation-menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="designation-menu-item-0">Option A</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="designation-menu-item-1">Option B</a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="designation-menu-item-2">Option C</a>
                    </div>
                </div>
            </div>

            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" name="search" id="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-2xl leading-5 bg-white shadow-sm placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" placeholder="Search" >
            </div>
        </div>

        <div class="bg-white rounded-2xl overflow-x-auto mt-5"> {{-- INNER Container (White Table Area) --}}
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        First Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Last Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Designation
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Branch
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Extension
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Personal Num
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        John
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Doe
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Software Engineer
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Head Office
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        1234
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        +1-555-123-4567
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-cyan-600 hover:text-cyan-900">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        Jane
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Smith
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Product Manager
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Branch Office A
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        5678
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        +1-555-987-6543
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-cyan-600 hover:text-cyan-900">Edit</a>
                    </td>
                </tr>
                <!-- More rows... -->
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
