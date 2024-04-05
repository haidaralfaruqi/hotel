<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="bg-gray-50 text-white">
            <div class="px-4 mx-auto max-w-7xl sm:px-6">
                <div class="relative pt-2 pb-4 sm:pb-6">
                    <nav class="relative flex items-center justify-between sm:h-8 md:justify-center" aria-label="Global">
                        <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                            <div class="flex items-center justify-between w-full md:w-auto">
                                <a href="#">
                                    <span class="sr-only">Company Name</span>
                                    <img class="w-auto h-6 sm:h-8" src="https://www.svgrepo.com/show/448244/pack.svg" loading="lazy" width="151" height="30">
                                </a>
                                <div class="flex items-center -mr-2 md:hidden">
                                    <button class="inline-flex items-center justify-center p-2 text-gray-400 bg-gray-50 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-50"  type="button" aria-expanded="false">
                                        <span class="sr-only">Open main menu</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex md:space-x-4 list-none">
                            <li>
                                <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-900">Pricing</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-900">Gallery</a>
                            </li>
                            <li>
                                <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-900">Blog</a>
                            </li>
                        </div>
                        <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
                        <div class="inline-flex rounded-full shadow">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-3 py-1 text-sm text-gray-900 bg-white border border-transparent rounded-full cursor-pointer font-medium hover:bg-gray-50">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="inline-flex items-center px-3 py-1 text-sm text-gray-900 bg-white border border-transparent rounded-full cursor-pointer font-medium hover:bg-gray-50">
                                        Log in
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="inline-flex items-center px-3 py-1 text-sm text-gray-900 bg-white border border-transparent rounded-full cursor-pointer font-medium hover:bg-gray-50">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>

                    </nav>
                </div>
            </div>
        </nav>

        <section class="text-gray-700 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Sebelum penuh
                <br class="hidden lg:inline-block">Bisa booking duluan
            </h1>
            <p class="mb-8 leading-relaxed">Dengan Hotelku Booking Hotel jadi mudah dan praktis</p>
            <div class="flex justify-center">
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Pesan sekarang!</button>
            </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
            <img class="object-cover object-center rounded" alt="hero" src="https://www.kayak.co.id/rimg/himg/d0/cc/07/expediav2-334942-269765724-646228.jpg?width=1366&height=768&crop=true">
            </div>
        </div>
        </section>
        
       
        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="sm:col-span-2">
                    <a href="#" class="inline-flex items-center">
                        <img src="https://mcqmate.com/public/images/logos/60x60.png" alt="logo" class="h-8 w-8">
                        <span class="ml-2 text-xl font-bold tracking-wide text-gray-800">Hotelku</span>
                    </a>
                    <div class="mt-6 lg:max-w-xl">
                        <p class="text-sm text-gray-800">
                            Hotelku adalah website booking hotel yang mudah dan cepat.
                            </p>
                    </div>
                </div>

                <div class="flex flex-col gap-2 text-sm">
                    <p class="text-base font-bold tracking-wide text-gray-900">Popular Courses</p>
                    <a href="#">UPSC - Union Public Service Commission</a>
                    <a href="#">General Knowledge</a>
                    <a href="#">MBA</a>
                    <p class="text-base font-bold tracking-wide text-gray-900">Popular Topics</p>
                    <a href="#">Human Resource Management</a>
                    <a href="#">Operations Management</a>
                    <a href="#">Marketing Management</a>
                </div>

                <div>
                    <p class="text-base font-bold tracking-wide text-gray-900">COMPANY IS ALSO AVAILABLE ON</p>
                    <div class="flex items-center gap-1 px-2">
                        <a href="#" class="w-full min-w-xl">
                            <img src="https://mcqmate.com/public/images/icons/playstore.svg" alt="Playstore Button"
                                class="h-10">
                        </a>
                        <a class="w-full min-w-xl" href="https://www.youtube.com/channel/UCo8tEi6SrGFP8XG9O0ljFgA">
                            <img src="https://mcqmate.com/public/images/icons/youtube.svg" alt="Youtube Button"
                                class="h-28">
                        </a>
                    </div>
                    <p class="text-base font-bold tracking-wide text-gray-900">Contacts</p>
                    <div class="flex">
                        <p class="mr-1 text-gray-800">Email:</p>
                        <a href="#" title="send email">admin@company.com</a>
                    </div>
                </div>

                </div>

                <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
                <p class="text-sm text-gray-600">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
                <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
                    <li>
                        <a href="#"
                            class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy
                            &amp; Cookies Policy
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Disclaimer
                        </a>
                    </li>
                </ul>
                </div>
                 
        </footer>
            
    </body>
</html>
