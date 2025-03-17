<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Landing Page Title</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mont:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="antialiased font-mont bg-white ...">

<div >
    <div class="landing-page relative sm:flex selection:text-white  overflow-hidden mx-auto max-w-6xl my-4"> {{-- Main container set to landing-page, rounded corners added, max-w-7xl for responsiveness, overflow-hidden to clip rounded corners, border added, border-opacity-60, shadow-lg --}}
        <div class="flex w-full p-5 shadow-lg"> {{-- Inner flex container for 50/50 split --}}

            {{-- --- Column 1: Image (Left - 50% Width, No Background) --- --}}
            <div class="md:w-1/2 w-full"> {{-- md:w-1/2 sets 50% width on medium and up, w-full for mobile --}}
                <img src="/images/landing.png" alt="Landing Page Cover Image" class="object-cover h-full w-full block"> {{-- Image as landing page cover, alt text updated --}}
            </div>

            {{-- --- Column 2: Description and Button (Right - 50% Width, White Background) --- --}}
            <div class="md:w-1/2 w-full bg-white ... p-6 lg:p-16 flex flex-col justify-center"> {{-- md:w-1/2 for 50% width, bg-white added, description and button container --}}
                <h1 class="text-[54px] font-semibold text-zinc-950 leading-tight bg-clip-text">President's Secretariat <br> Call Center <br> Management <br> Tool
                </h1>

                <p class="mt-6 text-gray-600 leading-relaxed text-lg">

                </p>

                <div class="mt-10">
                    <a href="{{ route('login') }}" class="inline-flex items-center bg-cyan-800 text-white px-8 py-3 rounded-md font-semibold text-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Get Started {{-- "Get Started" Button --}}
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@vite('resources/js/app.js')
</body>
</html>
