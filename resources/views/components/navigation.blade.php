<div class="fixed w-full z-50 bg-white shadow-md py-2">
    <div class="container mx-auto px-4 flex justify-between items-center">

        <div class="flex items-center justify-between w-full md:w-auto">
            <div class="hidden md:block md:bg-gray-900 md:rounded-full md:hover:bg-gray-700 md:cursor-pointer">
                <img src="{{ asset('images/icon.jpeg') }}" alt="Website Logo" class="h-12 w-auto rounded-full"/>
            </div>
        </div>

        <div class="hidden md:block relative">
            <nav class="flex flex-row gap-5 rounded-md bg-[#F9F7F7] px-6 py-3 font-semibold rounded-s ">
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
                        <a href="{{ route('branches.create') }}"
                           class="cursor-pointer {{ request()->routeIs('branches.create') ? 'bg-[#3F72AF] text-white' : 'text-[#112D4E]' }} rounded-md px-2 py-2">
                            Add New Branch
                        </a>
                    </div>
                @endif
            </nav>
        </div>

        <div class="flex flex-row gap-5  px-6 py-2 font-semibold rounded-md">
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
    </div>
</div>
