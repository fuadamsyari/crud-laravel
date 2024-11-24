<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&family=Lilita+One&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Aplikasi Service')</title>
</head>
<body>
    <div class="flex flex-col min-h-screen">
        <main class="flex-grow">

            {{-- Start Navbar --}}
            @include('partials.navbar')
            {{-- End Navabar --}}

            {{-- Start Containt --}}
            <div class="container mx-auto py-4">
                @yield('content')
            </div>
            {{-- End Contain --}}

        </main>

        {{-- Start Footer --}}
        @include('partials.footer')
        {{-- End Footer --}}

    </div>
</body>

</html> 
