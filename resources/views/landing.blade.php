<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PS Telephone Directory</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mont:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/css/app.css')
    <style>
        /*  CSS styles */
        .background {
            background-position: center center;
            background-size: 100% 100%; /* or 'cover' for different effect */
            background-repeat: no-repeat;
            height: 700px; /* adjust as needed */
        }

        @media (max-width: 991px) {
            .background {
                background-size: cover; /* original CSS specified 'cover' on smaller screens */
            }
        }
    </style>
</head>
<body class="antialiased font-mont bg-white">

<div class="relative"> {{-- container-fluid main equivalent --}}

    <nav class="absolute top-0 left-0 right-0 z-10 w-full bg-transparent p-2 md:p-4"> {{-- navbar navbar-default equivalent --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8"> {{-- container-fluid within navbar --}}
            <div class="flex justify-between items-center"> {{--  navbar-header + navbar-collapse flexbox for layout --}}
                <div class="flex items-center"> {{-- navbar-header content --}}
                    <div class="md:hidden"> {{-- navbar-toggle equivalent --}}
                        <button type="button" class="text-white focus:outline-none focus:ring-2 focus:ring-white" aria-label="Toggle navigation"> {{-- navbar-toggle button --}}
                            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2z"/>
                            </svg>
                        </button>
                    </div>
{{--                    <a href="/" class="navbar-brand text-white text-xl md:text-2xl font-bold font-verdana">President's Secretary Telephone Directory</a> --}}{{-- navbar-brand with text styles --}}
                </div>
                <div class="hidden md:flex space-x-4"> {{-- collapse navbar-collapse equivalent --}}
{{--                    <a href="#" class="text-white hover:text-gray-200">About</a> --}}{{-- nav navbar-nav items --}}
{{--                    <a href="#" class="text-white hover:text-gray-200">Contact Us</a>--}}
                </div>
            </div>
        </div>
    </nav>

    <div id="myCarousel" class="carousel carousel-fade slide relative" data-ride="carousel" data-interval="3000"> {{-- carousel, carousel-fade, slide equivalent --}}
        <div class="carousel-inner relative w-full overflow-hidden" role="listbox"> {{-- carousel-inner equivalent --}}
            <div class="item active background b bg-b bg-center bg-cover transition-opacity duration-500 ease-in-out" style="background-image: linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)), url('{{ asset('images/office.jpeg') }}')"></div> {{-- item background b, now ACTIVE as it's the first/only image --}}
        </div>
    </div>

    <div class="covertext absolute top-1/3 left-0 right-0"> {{-- covertext equivalent --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8"> {{-- container for covertext content --}}
            <div class="lg:w-10/12 mx-auto"> {{-- col-lg-10 equivalent --}}
                <h1 class="title text-white text-center text-5xl md:text-5xl font-bold font-verdana">Presidential Secretariat</h1> {{-- title text styles --}}
                <h1 class="title text-white text-center text-5xl md:text-4xl font-bold font-verdana">eContact Directory</h1> {{-- title text styles --}}

            </div>
            <div class="explore mt-4 text-center"> {{-- explore styles --}}
                <a href="{{ route('login') }}">
                    <button type="button" class="explorebtn bg-orange-500 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded-full text-lg w-60">Login</button> {{-- explorebtn with Tailwind button styles --}}
                </a>
            </div>
        </div>
    </div>

</div>

@vite('resources/js/app.js')
<script>
    // Basic JavaScript for carousel functionality
    document.addEventListener('DOMContentLoaded', function() {
        const carouselInner = document.querySelector('.carousel-inner');
        const items = document.querySelectorAll('.item');
        let currentIndex = 0;
        let intervalTime = 3000;
        let carouselInterval;

        // --- ADJUSTMENT FOR REMOVED SLIDES: Reset currentIndex if it goes out of bounds ---
        if (currentIndex >= items.length) {
            currentIndex = 0; // Or handle it as needed if you expect no slides sometimes
        }
        // --- END ADJUSTMENT ---


        function nextSlide() {
            if (items.length <= 1) return; // Exit if only one or zero slides left
            items[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % items.length;
            items[currentIndex].classList.add('active');
        }

        function startCarousel() {
            if (items.length <= 1) return; // Don't start carousel if only one or zero slides
            carouselInterval = setInterval(nextSlide, intervalTime);
        }

        function pauseCarousel() {
            clearInterval(carouselInterval);
        }

        startCarousel(); // Start carousel on page load
    });
</script>
</body>
</html>

