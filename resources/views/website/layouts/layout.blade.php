<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>UINWOLC</title>


    @include('website.layouts.style')
    <!-- Loader -->
    <div id="loader" class="lds-dual-ring hidden overlay"></div>
    <!-- Loader End -->
    @stack('css')
    @livewireStyles

</head>

<body>

    @include('website.layouts.header')

    @yield('content')

    {{-- <div class="loader">
        <div class="loader-icon"></div>
    </div> --}}
    @include('website.layouts.footer')

    @include('website.layouts.script')

    @stack('js')

    @livewireScripts

</body>

</html>
