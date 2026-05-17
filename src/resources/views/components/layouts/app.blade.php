<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Portfolio' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-gray-950 text-white min-h-screen">

    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-4 flex justify-between">

            <h1 class="font-bold text-xl">
                Yuliadhy Nugraha
            </h1>

            <div class="flex gap-4">
                <a href="/" class="hover:text-blue-400">
                    Home
                </a>

                <a href="/projects" class="hover:text-blue-400">
                    Projects
                </a>

                <a href="/contact" class="hover:text-blue-400">
                    Contact
                </a>
            </div>

        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>