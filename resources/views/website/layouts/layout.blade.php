<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>UINWOLC</title>


    @include('website.layouts.style')

    @stack('css')
    @livewireStyles

</head>

<body>

    @include('website.layouts.header')

    @yield('content')

    @include('website.layouts.footer')

    @include('website.layouts.script')

    @stack('js')

    @livewireScripts

</body>

</html>
