<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap" rel="stylesheet">
    <title>Pastebin - Artisans Sverige</title>
    @stack('head')
</head>

<body>
    <div class="flex flex-col h-screen w-full" id="app">
        <header class="w-full py-4 px-4 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">
                    <a href="https://artisans.se"><span style="color: #e6324d;">Artisans</span> Sverige</a>
                </h1>
            </div>
            <div>
                <a href="https://events.artisans.se">Events</a>
                <a class="ml-2" href="https://paste.artisans.se">Pastebin</a>
                <a class="ml-2" href="https://podcast.artisans.se">Podcast</a>
                <a class="ml-2" href="http://bit.ly/laravelseslack">Slack</a>
            </div>
        </header>
        <div class="flex-grow bg-gray-400 border">
            @yield('body')
        </div>
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
    @stack('scripts')
</body>

</html>