<!-- resources/views/layouts/main.blade.php -->

<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Depression Meter</title>
        <meta name="description" content="Depression meter is a web application that helps to detect early signs of depression through social media post analysis.">
        <meta name="keywords" content="
        <meta name="version" content="1..0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('assets/images/a.png') }}" rel="shortcut icon">

        <link href="{{ asset('assets/libs/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
        @vite('resources/css/app.css')
    </head>
    
    <body class="font-roboto text-base text-slate-900 dark:text-white dark:bg-slate-800 bg-[url('{{ asset('assets/images/bg1.png') }}')] bg-no-repeat bg-center bg-cover min-h-screen flex flex-col">

        <script src="https://cdn.tailwindcss.com"></script>
    
        <script>
            tailwind.config = {
                darkMode: 'class',
            }
        </script>
    
        <!-- Main Content -->
        <div class="content flex-grow">
            @yield('content')
        </div>
    
        @include('includes.footer')
    
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 h-9 w-9 text-center bg-red-500 text-white leading-9">
            <i class="mdi mdi-arrow-up"></i>
        </a>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets/libs/wow.js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/libs/gumshoejs/gumshoe.polyfills.min.js') }}"></script>
        <script src="{{ asset('assets/libs/tobii/js/tobii.min.js') }}"></script>
        <script src="{{ asset('assets/libs/tiny-slider/min/tiny-slider.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
    
    </body>    
</html>