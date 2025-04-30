<div class="fixed w-full z-50 bg-white shadow-md py-2">
    <div class="container mx-auto px-4 flex justify-between items-center">

        <div class="flex items-center md:w-auto">
            <!-- Desktop Logo (Hidden on mobile, Shown on desktop) -->
            <div class="hidden md:block md:bg-gray-900 md:hover:bg-gray-700 md:cursor-pointer">
                <img src="{{ asset('images/logo.jpg') }}" alt="Website Logo" class="h-12 w-auto"/>
            </div>
            <!-- Mobile Logo (Shown on mobile, Hidden on desktop) -->
            <div class="block md:hidden md:bg-gray-900 md:hover:bg-gray-700 md:cursor-pointer">
                <img src="{{ asset('images/logo.jpg') }}" alt="Website Logo" class="h-12 w-auto"/>
            </div>
        </div>

        <div class="md:hidden flex items-center">
            <!-- Hamburger Icon (Mobile) -->
            <button id="hamburger-icon" class="focus:outline-none">
                <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <div class="hidden md:block relative">
            <nav class="flex flex-row gap-5 px-6 py-3 font-semibold rounded-s ">
                <div class="relative">
                    <a href="{{ route('dashboard') }}"
                       class="cursor-pointer {{ request()->routeIs('dashboard') ? 'bg-[#3F72AF] text-white' : 'text-[#112D4E]' }} rounded-md px-2 py-2">
                        Dashboard
                    </a>
                </div>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="relative ">
                        <a href="{{ route('contacts.create') }}"
                           class="cursor-pointer {{ request()->routeIs('contacts.create') ? 'bg-[#3F72AF] text-white' : 'text-[#112D4E]' }} rounded-md px-2 py-2 ">
                            Add New contact
                        </a>
                    </div>
                @endif
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="relative ">
                        <a href="{{ route('branches.index') }}"
                           class="cursor-pointer {{ request()->routeIs('branches.index') ? 'bg-[#3F72AF] text-white' : 'text-[#112D4E]' }} rounded-md px-2 py-2">
                            Add New Branch
                        </a>
                    </div>
                @endif
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="relative ">
                        <a href="{{ route('designation.index') }}"
                           class="cursor-pointer {{ request()->routeIs('designation.index') ? 'bg-[#3F72AF] text-white' : 'text-[#112D4E]' }} rounded-md px-2 py-2">
                            Add New Designation
                        </a>
                    </div>
                @endif
            </nav>
        </div>

        <div class="hidden md:flex flex-row gap-5  px-6 py-2 font-semibold rounded-md">
            <div class=" rounded-md text-[#112D4E] px-2 py-2">
                @if(auth()->check() && auth()->user()->isAdmin())
                    Admin
                @elseif(auth()->check() && auth()->user()->isOperator())
                    User
                @else
                    User
                @endif
            </div>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-[#3F72AF] rounded-md text-white px-2 py-2">Logout</button>
                </form>
            </div>
        </div>

        <!-- Mobile Navigation Menu (Initially Hidden) -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-full right-0 mt-2 bg-white shadow-md rounded-md w-full">
            <nav class="flex flex-col px-4 py-3 font-semibold">
                <div class="relative py-2">
                    <a href="{{ route('dashboard') }}"
                       class="block cursor-pointer {{ request()->routeIs('dashboard') ? 'bg-[#3F72AF] text-white' : 'text-[#112D4E]' }} rounded-md px-2 py-2">
                        Dashboard
                    </a>
                </div>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="relative py-2">
                        <a href="{{ route('contacts.create') }}"
                           class="block cursor-pointer {{ request()->routeIs('contacts.create') ? 'bg-[#3F72AF] text-white' : 'text-[#112D4E]' }} rounded-md px-2 py-2 ">
                            Add New contact
                        </a>
                    </div>
                @endif
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="relative py-2">
                        <a href="{{ route('branches.index') }}"
                           class="block cursor-pointer {{ request()->routeIs('branches.index') ? 'bg-[#3F72AF] text-white' : 'text-[#112D4E]' }} rounded-md px-2 py-2">
                            Add New Branch
                        </a>
                    </div>
                @endif
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="relative py-2">
                        <a href="{{ route('designation.index') }}"
                           class="block cursor-pointer {{ request()->routeIs('designation.index') ? 'bg-[#3F72AF] text-white' : 'text-[#112D4E]' }} rounded-md px-2 py-2">
                            Add New Designation
                        </a>
                    </div>
                @endif
                <div class="relative py-2 hidden md:block">
                    <div class=" rounded-md text-[#112D4E] px-2 py-2">
                        @if(auth()->check() && auth()->user()->isAdmin())
                            Admin
                        @elseif(auth()->check() && auth()->user()->isOperator())
                            User
                        @else
                            User
                        @endif
                    </div>
                </div>
                <div class="relative py-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="md:bg-[#3F72AF] rounded-md text-black md:text-white px-2 py-2 w-full text-left">Logout</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>

<script>
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const mobileMenu = document.getElementById('mobile-menu');

    hamburgerIcon.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

