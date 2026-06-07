<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Product System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body
    class="font-sans antialiased"
    style="
        background: linear-gradient(135deg,#111827,#1f2937);
        min-height:100vh;
    "
>

    <div
        class="min-h-screen flex flex-col justify-center items-center"
    >

        <div class="text-center mb-6">

            <h1
                style="
                    color:#f59e0b;
                    font-size:38px;
                    font-weight:bold;
                "
            >
                🛍 Product System
            </h1>

            <p
                style="
                    color:white;
                    opacity:.8;
                "
            >
                Admin Panel
            </p>

        </div>

        <div
            class="w-full sm:max-w-lg px-10 py-10 bg-white shadow-2xl overflow-hidden rounded-4"
            style="
              border-top:8px solid #f59e0b;
            "
        >

            {{ $slot }}

        </div>

    </div>

</body>
</html>