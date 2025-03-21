<div class="bg-white shadow-md py-2">
    <div class="container mx-auto px-4 flex justify-between items-center">

        <div class="flex items-center justify-between w-full md:w-auto">
            <div
                class="bg-gray-900 text-white rounded-full px-6 py-3 font-semibold hover:bg-gray-700 cursor-pointer md:hidden">
                Logo
            </div>
            <div class="hidden md:block md:bg-gray-900 md:rounded-full md:hover:bg-gray-700 md:cursor-pointer">
                <img src="{{ asset('images/icon.jpeg') }}" alt="Website Logo" class="h-12 w-auto rounded-full"/>
            </div>


            <button id="mobile-menu-button" class="md:hidden focus:outline-none" aria-label="Toggle mobile menu">
                <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>


        <div class="hidden md:block relative">
            <nav
                class="bg-black rounded-full shadow-input flex justify-center space-x-4 px-8 py-3 ">
                <div class="relative ">
                    <p class="cursor-pointer text-white hover:opacity-[0.9]">Dashboard</p>
                </div>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="relative ">
                        <p class="cursor-pointer text-white hover:opacity-[0.9]">Add New contact</p>
                    </div>
                @elseif(auth()->check() && auth()->user()->isOperator())
                    <div class="relative ">
                        <p class="cursor-pointer text-white hover:opacity-[0.9]">Advanced-Search</p>
                    </div>
                @endif
            </nav>
        </div>

        <div class="flex flex-row gap-5 bg-black px-6 py-2 font-semibold rounded-full">
            <div class="text-white px-2 py-1">
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
                    <button type="submit" class="bg-white rounded-full text-black px-2 py-1">Logout</button>
                </form>
            </div>
        </div>


        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 right-0 bg-white shadow-md z-10">
            <nav class="flex flex-col px-4 py-2">
                <p class="block py-2 cursor-pointer text-gray-700 hover:bg-gray-100">Dashboard</p>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <p class="block py-2 cursor-pointer text-gray-700 hover:bg-gray-100">Add contact</p>
                @elseif(auth()->check() && auth()->user()->isOperator())
                    <p class="block py-2 cursor-pointer text-gray-700 hover:bg-gray-100">Advanced-Search</p>
                @endif
                <p class="block py-2 cursor-pointer text-gray-700 hover:bg-gray-100">Download</p>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <p class="block py-2 cursor-pointer text-gray-700 hover:bg-gray-100">Admin</p>
                @endif
                <div class="py-2">
                    <div
                        class="bg-gray-900 text-white rounded-full px-6 py-3 font-semibold hover:bg-gray-700 cursor-pointer text-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <span>
                                @if(auth()->check() && auth()->user()->isAdmin())
                                    Admin
                                @elseif(auth()->check() && auth()->user()->isOperator())
                                    User
                                @else
                                    User
                                @endif
                            </span>
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>


    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                console.log("Hamburger button CLICKED!");
                mobileMenu.classList.toggle('hidden');
                const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
                mobileMenuButton.setAttribute('aria-expanded', !expanded);
            });
        }
    });
</script>
