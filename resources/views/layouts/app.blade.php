<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'CipaMilk - Sentra Susu Cipageran')</title>

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @php
        $vite = app(\Illuminate\Foundation\Vite::class);
        $host = request()->getHost();
        $isPrivateIp = filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)
            && preg_match('/^(10\.|192\.168\.|172\.(1[6-9]|2\d|3[01])\.)/', $host);
        $isLocalDevHost = in_array($host, ['localhost', '127.0.0.1', '::1', '0.0.0.0'], true)
            || str_ends_with($host, '.test')
            || str_ends_with($host, '.local')
            || str_ends_with($host, '.localhost')
            || $isPrivateIp;

        if (! $isLocalDevHost) {
            // Non-local hosts (for example ngrok) must not point at the local Vite hot server.
            $vite->useHotFile(storage_path('framework/vite.hot.public'));
        }
    @endphp

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
