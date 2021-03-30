<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'HowUMusic') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-900">
            <!-- Page Heading -->
            @livewire('navigation-dropdown')
            <!-- Page Content -->
            <main>
                {{ $content }}
            </main>
            <div class="bg-black w-full">
                <div class="w-3/4 text-white mx-auto py-16">
                    <div class="grid grid-cols-2">
                        <div class="cols-span-1 mx-auto">
                            <a href="/articles/all" class="text-2xl">Статьи</a>
                            <div class="text-lg"><a href="/articles/guides">Руководства</a></div>
                            <div class="text-lg"><a href="/articles/reviews">Обзоры</a></div>
                            <div class="text-lg"><a href="/articles/discourses">Размышления</a></div>
                        </div>
                        <div class="cols-span-1 mx-auto">
                            <a class="text-2xl" href="/news">Новости</a>
                        </div>
                    </div>
                </div>
                <div class="ml-48 pb-10"><x-jet-application-mark/></div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>


