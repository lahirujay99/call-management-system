<div class="bg-white shadow-md py-2">
    <div class="container mx-auto px-4 flex justify-between items-center">

        <div class="bg-gray-900 text-white rounded-full px-6 py-3 font-semibold hover:bg-gray-700 cursor-pointer">
            Logo
        </div>

        <div class="relative">
            <nav
                class="bg-black rounded-full shadow-input flex justify-center space-x-4 px-8 py-3 ">
                <div class="relative ">
                    <p class="cursor-pointer text-white hover:opacity-[0.9]">Dashboard</p>
                </div>
                <div class="relative ">
                    <p class="cursor-pointer text-white hover:opacity-[0.9]">Advanced-Search</p>
                </div>
                <div class="relative ">
                    <p class="cursor-pointer text-white hover:opacity-[0.9]">Download</p>
                </div>
                <div class="relative ">
                    <p class="cursor-pointer text-white hover:opacity-[0.9]">Admin</p>
                </div>
            </nav>
        </div>

        <div class="bg-gray-900 text-white rounded-full px-6 py-3 font-semibold hover:bg-gray-700 cursor-pointer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>

    </div>
</div>

