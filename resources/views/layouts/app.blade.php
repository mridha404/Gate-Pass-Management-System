<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gate Pass </title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#121213] text-white min-h-screen flex flex-col">
    <header class="flex justify-between items-center p-4">
        <div class="logo flex items-center">
            <!-- Replace with your actual logo -->
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
            </svg>
            <div class="text-white text-sm font-medium ml-2">Gate Pass Management System</div>
        </div>
        <div>
            <a href="/login">
                <button class="bg-white text-black px-4 py-2 rounded mr-2 hover:bg-gray-200 transition text-sm font-extralight">Log in</button>
            </a>
            <a href="/register">
                <button class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200 transition text-sm font-extralight">Sign up</button>
            </a>
        </div>
    </header>

    <main class="flex-grow flex flex-col items-center justify-center p-4">
        <div class="w-full max-w-2xl">
            <div class="relative mb-8">
                <input type="" placeholder="Welcome to Gate Pass Management System" class="w-full p-3 pl-10 rounded-lg bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg class="w-6 h-6 text-gray-500 absolute left-2 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
            </div>


        </div>
    </main>

    <footer class="text-center p-4 text-gray-500">
        <p>&copy; 2024 Varendra University. All rights reserved.</p>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>
