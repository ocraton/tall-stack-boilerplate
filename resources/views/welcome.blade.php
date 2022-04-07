<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'UtilityApp') }}</title>

</head>

<body class="leading-normal tracking-normal text-gray-900" style="font-family: 'Source Sans Pro', sans-serif;">

    <div class="h-screen pb-8 bg-right bg-cover" style="background-image:url('https://www.tailwindtoolbox.com/templates/bg.svg');">
        <!--Nav-->
        <div class="w-full container mx-auto p-6">

            <div class="w-full flex items-center justify-between">
                <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                    <img src="{{ asset('img/logo.svg') }}">
                </a>

                <div class="flex w-1/2 justify-end content-center">
                    <a class="inline-block text-blue-300 no-underline hover:text-indigo-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4" href="">
                        <img class="fill-current h-6" title="fai una donazione PayPal" src="https://upload.wikimedia.org/wikipedia/commons/b/b7/PayPal_Logo_Icon_2014.svg">
                    </a>
                    <a class="inline-block text-blue-300 no-underline hover:text-indigo-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 " href="">
                        <img class="fill-current h-6" src="https://upload.wikimedia.org/wikipedia/commons/4/46/Bitcoin.svg">
                    </a>
                </div>

            </div>

        </div>

        <!--Main-->
        <div class="container pt-8 md:pt-10 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">

            <!--Left Col-->
            <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
                <h1 class="my-4 text-3xl md:text-5xl text-purple-800 font-bold leading-tight text-center md:text-left slide-in-bottom-h1">
                    App that doing things
                </h1>
                <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">
                    Laravel / Tailwind / Nova / Jetstream / Livewire
                </p>

                <p class="text-blue-400 font-bold pb-8 lg:pb-6 text-center md:text-left fade-in">
                    @auth Vai al tuo profilo @else Register/Login: @endauth
                </p>
                <div class="flex w-full justify-center md:justify-start pb-24 lg:pb-0 fade-in">
                    @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                            Log in
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                                Register
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            @endif
                        @endauth
                    @endif
                </div>

            </div>

            <!--Right Col-->
            <div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
                <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="https://www.tailwindtoolbox.com/templates/devices.svg">
            </div>

            <!--Footer-->
            <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
                <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; App {{ date('Y') }}</a>
            </div>

        </div>


    </div>

</body>

</html>
