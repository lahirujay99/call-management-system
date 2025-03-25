<x-app-layout>

    <div class="bg-cyan-950 rounded-3xl shadow-md overflow-hidden mx-auto max-w-7xl my-7"> {{-- Main OUTER Container --}}
        <div class="px-4 py-3 border-gray-300 flex items-center space-x-4 bg-cyan-950 rounded-t-lg"> {{-- Filters & Search Area --}}
            {{-- Branch Filter Dropdown (for sorting by Branch Name) --}}
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
                        @foreach($branches as $branch)
                            <a href="{{ route('dashboard', ['sortBy' => 'branch', 'sortDirection' => 'asc']) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="branch-menu-item-{{ $branch->id }}">{{ $branch->name }} (A-Z)</a>
                            <a href="{{ route('dashboard', ['sortBy' => 'branch', 'sortDirection' => 'desc']) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="branch-menu-item-{{ $branch->id }}-desc">{{ $branch->name }} (Z-A)</a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Designation Filter Dropdown (for sorting Designation) --}}
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
                        <a href="{{ route('dashboard', ['sortBy' => 'designation', 'sortDirection' => 'asc']) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="designation-menu-item-0">Sort A-Z</a>
                        <a href="{{ route('dashboard', ['sortBy' => 'designation', 'sortDirection' => 'desc']) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="designation-menu-item-1">Sort Z-A</a>
                    </div>
                </div>
            </div>

            {{-- Search Bar --}}
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <form action="{{ route('dashboard') }}" method="GET">
                    <input type="text" name="search" id="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-2xl leading-5 bg-white shadow-sm placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" placeholder="Search" value="{{ $search ?? '' }}">
                </form>
            </div>
        </div>

        <div class="bg-white rounded-2xl overflow-x-auto mt-5"> {{-- INNER Container (White Table Area) --}}
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'first_name', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'first_name' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            First Name
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'last_name', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'last_name' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Last Name
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'designation', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'designation' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Designation
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'branch', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'branch' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Branch
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'extension_code', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'extension_code' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Extension
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'personal_mobile', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'personal_mobile' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Personal Num
                        </a>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($contacts as $contact)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $contact->first_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->last_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->designation }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->branch->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->extension_code }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->personal_mobile }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            @if(Auth::user()->isAdmin()) {{-- Show Edit link only for admin --}}
                            <a href="#" class="text-cyan-600 hover:text-cyan-900">Edit</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center" colspan="7">
                            No contacts found matching your search.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <hr class="mt-10 border-gray-400"/>
            {{-- Pagination Buttons Moved INSIDE the INNER Container and in Grid --}}
            <div class="mt-4 px-4 pb-3 grid grid-cols-2 gap-2">
                <div class="flex justify-center"> {{-- Grid Item for Previous Button - Centered --}}
                    @if ($contacts->onFirstPage())
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-2xl bg-cyan-950 text-white cursor-default opacity-80"> {{-- Removed border classes --}}
                            Previous
                        </span>
                    @else
                        <a href="{{ $contacts->previousPageUrl() }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-2xl bg-cyan-950 text-white hover:bg-cyan-800"> {{-- Removed border classes --}}
                            Previous
                        </a>
                    @endif
                </div>
                <div class="flex justify-center"> {{-- Grid Item for Next Button - Centered --}}
                    @if ($contacts->hasMorePages())
                        <a href="{{ $contacts->nextPageUrl() }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-2xl bg-cyan-950 text-white hover:bg-cyan-800"> {{-- Removed border classes --}}
                            Next
                        </a>
                    @else
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-2xl bg-cyan-950 text-white cursor-default opacity-80"> {{-- Removed border classes --}}
                            Next
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const branchMenuButton = document.getElementById('branch-menu-button');
            const branchMenu = document.querySelector('[aria-labelledby="branch-menu-button"]');

            branchMenuButton.addEventListener('click', () => {
                branchMenu.classList.toggle('hidden');
            });

            const designationMenuButton = document.getElementById('designation-menu-button');
            const designationMenu = document.querySelector('[aria-labelledby="designation-menu-button"]');

            designationMenuButton.addEventListener('click', () => {
                designationMenu.classList.toggle('hidden');
            });

            // Close dropdowns if clicked outside
            document.addEventListener('click', (event) => {
                if (!branchMenuButton.contains(event.target) && !branchMenu.classList.contains('hidden')) {
                    branchMenu.classList.add('hidden');
                }
                if (!designationMenuButton.contains(event.target) && !designationMenu.classList.contains('hidden')) {
                    designationMenu.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>
