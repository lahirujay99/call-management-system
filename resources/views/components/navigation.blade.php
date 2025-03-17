<nav class="bg-black">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">

            {{-- --- DIV 1: Logo Section --- --}}
            <div class="flex flex-shrink-0 items-center">
                <img class="h-14 w-auto" src="/images/logo.png" alt="Your Company">
                <span class="ml-2 text-white font-semibold text-lg">PS-Call-Manager</span>
            </div>

            {{-- --- DIV 2: Navigation Links Section --- --}}
            <div class="hidden sm:ml-6 sm:block">
                <div class="bg-[#2D253A] flex space-x-4 rounded-md p-2">
                    <a href="#" class="text-white hover:bg-[#403852] hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                    <a href="#" class="text-white hover:bg-[#403852] hover:text-white rounded-md px-3 py-2 text-sm font-medium">Advanced-Search</a>
                    <a href="#" class="text-white hover:bg-[#403852] hover:text-white rounded-md px-3 py-2 text-sm font-medium">Download</a>
                    <a href="#" class="text-white hover:bg-[#403852] hover:text-white rounded-md px-3 py-2 text-sm font-medium">Admin</a>
                </div>
            </div>

            {{-- --- DIV 3: Auth Button Section (Login/Logout Conditional) --- --}}
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="ml-3 relative">
                    <div>
                        @auth {{-- Check if user is authenticated --}}
                        <form method="POST" action="{{ route('logout') }}"> {{-- Logout form for POST request --}}
                            @csrf
                            <button type="submit" class="relative p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Logout</span>
                                <span class="bg-[#2D253A] text-white rounded-md px-3 py-2 text-sm font-medium">Logout</span>
                            </button>
                        </form>
                        @else {{-- If user is NOT authenticated --}}
                        <a href="{{ route('login') }}" class="relative p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Login</span>
                            <span class="bg-[#2D253A] text-white rounded-md px-3 py-2 text-sm font-medium">Login</span>
                        </a>
                        @endauth
                    </div>
                </div>
            </div>

            {{-- Mobile Menu Button (Hamburger Icon) --}}
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button @click="open = !open" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-cloak>
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Mobile navigation links -->
            <a href="#" class="bg-[#2D253A] text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
            <a href="#" class="text-white hover:bg-[#2D253A] hover:text-white block rounded-md px-3 py-2 text-base font-medium">Advanced-Search</a>
            <a href="#" class="text-white hover:bg-[#2D253A] hover:text-white block rounded-md px-3 py-2 text-base font-medium">Download</a>
            <a href="#" class="text-white hover:bg-[#2D253A] hover:text-white block rounded-md px-3 py-2 text-base font-medium">Admin</a>
            @auth {{-- Conditional Logout Link in Mobile Menu --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-[#2D253A] text-white block rounded-md px-3 py-2 text-base font-medium mt-4 text-center w-full">Logout</button>
            </form>
            @else {{-- Conditional Login Link in Mobile Menu --}}
            <a href="{{ route('login') }}" class="bg-[#2D253A] text-white block rounded-md px-3 py-2 text-base font-medium mt-4 text-center">Login</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navigationMenu', () => ({
            open: false,
            toggleMenu() {
                this.open = !this.open;
            },
        }))
    })
</script>
