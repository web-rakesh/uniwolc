<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | UINWOLC</title>
    @include('university.layouts.style')
    @stack('css')
    @livewireStyles
</head>

<body>
    <!--Application Process -->
    <div class="dashboardPagSection">
        <div class="dashmenuOverlay"></div>
        @include('university.layouts.sidebar')
        <div class="dashboardPagesWrapper">
            @include('university.layouts.navbar')
            <div class="dashboardDtlsArea">
                @yield('content')

            </div>
        </div>
    </div>
    <!-- Application Process End -->


    @include('university.layouts.script')

    @stack('js')
    @livewireScripts

</body>

</html>
