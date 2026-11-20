@props(['title' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ? $title . ' - Clube Full-Stack' : 'Clube Full-Stack - Aulas do YouTube' }}</title>

    <!-- Google Fonts Preconnect & Kode Mono Stylesheet -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">

    <!-- Styles and Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    class="min-h-screen bg-zinc-950 text-zinc-100 font-sans antialiased selection:bg-brand selection:text-white"
    x-data="{ sidebarOpen: false, mobileSidebarOpen: false }"
>
    <!-- Header -->
    <x-header />

    <!-- Container Principal com Sidebar e Conteúdo -->
    <div class="flex min-h-[calc(100vh-4rem)] w-full">
        <!-- Sidebar Retrátil -->
        <x-sidebar />

        <!-- Conteúdo Principal -->
        <main class="flex-1 overflow-x-hidden p-4 sm:p-6 lg:p-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
