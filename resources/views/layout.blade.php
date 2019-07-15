<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/main.css">
    <title>Pastebin - Artisans Sverige</title>
    @stack('head')
</head>
<body>
    <div class="flex flex-col h-screen w-full" id="app">
        <header class="w-full py-4 px-2">
            <h1 class="text-xl">Artisans Sverige</h1>
        </header>
        <div class="flex-grow bg-gray-400 border">
            @yield('body')
        </div>
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>