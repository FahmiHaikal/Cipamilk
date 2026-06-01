<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'CipaMilk - Sentra Susu Cipageran')</title>

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background-main font-body-md text-text-primary min-h-screen selection:bg-accent-pink selection:text-white">

    @include('components.navbar')

    <main class="max-w-7xl mx-auto px-margin-mobile md:px-gutter space-y-12 pb-24">
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>
