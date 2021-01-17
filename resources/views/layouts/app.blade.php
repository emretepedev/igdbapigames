<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Games</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @livewireStyles
</head>
<body class="bg-gray-900 text-white">

<header class="border-b border-gray-800">
    <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
        <div class="flex flex-col lg:flex-row items-center">
            <ul class="flex ml-0 space-x-8 mt-6 lg:mt-0">
                <li><a href="/" class="hover:text-gray-400">Home</a></li>
                <li><a href="#" class="hover:text-gray-400">Games</a></li>
                <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
            </ul>
        </div>

        <div class="flex items-center mt-6 lg:mt-0">
            <livewire:search-dropdown>
            <div class="ml-6">
                <a href="#"><img class="rounded-full w-8" src="{{ asset('img/avatar.jpg') }}" alt="avatar"></a>
            </div>
        </div>
    </nav>
</header>

<main class="py-8">
    @yield('content')
</main>

<footer class="border-t border-gray-800">
    <div class="container mx-auto px-4 py-6">
        Powered by <a href="#" class="underline hover:text-gray-400">IGDB API</a>
    </div>
</footer>
<script src="https://kit.fontawesome.com/ae6228a6a4.js" crossorigin="anonymous"></script>
@livewireScripts
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>