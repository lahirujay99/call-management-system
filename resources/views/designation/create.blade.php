<x-app-layout>

    <div class="bg-white p-4 rounded-lg shadow-md mx-auto max-w-2xl my-5">


        <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Designation</h2>
        <hr class="border-b border-gray-200 mb-6">

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><span class="block sm:inline">{{ $error }}</span></li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('designation.store') }}" method="POST" class="space-y-6">
            @csrf


            <h3 class="text-lg font-medium text-gray-700 mb-4">Designation Details</h3>

            {{-- Branch Name Input Row --}}
            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                <label for="name"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Designation Name
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
</x-app-layout>
