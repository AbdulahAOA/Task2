<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    body {
        background: linear-gradient(135deg, #0f0c29, #302b63, #24243e) !important;
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #1a1a2e; }
    ::-webkit-scrollbar-thumb { background: #ffc107; border-radius: 10px; }

    nav{
        position: relative;
        z-index: 99999 !important;
    }

    .dropdown{
        position: relative;
    }

    .dropdown-menu{
        z-index: 999999 !important;
        position: absolute !important;
    }

    header{
        position: relative;
        z-index: 1 !important;
    }
</style>
</head>
<body>

    <div class="min-vh-100">

        @include('layouts.navigation')

        @isset($header)
            <header style="background: rgba(0,0,0,0.6); backdrop-filter: blur(10px); border-bottom: 2px solid #ffc107; padding: 15px 0;">
                <div class="container">
                    <h1 style="color: #ffc107; font-weight: 800; margin: 0; font-size: 1.5rem;">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endisset

        <main class="py-4">
            {{ $slot }}
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>