<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | UINWOLC</title>
    @include('staff.layouts.style')
    @stack('css')
    @livewireStyles
</head>

<body>
    <!--Application Process -->
    <div class="dashboardPagSection">
        <div class="dashmenuOverlay"></div>
        @include('staff.layouts.sidebar')
        <div class="dashboardPagesWrapper">
            @include('staff.layouts.navbar')
            <div class="dashboardDtlsArea">
                @yield('content')

            </div>
        </div>
    </div>
    <!-- Application Process End -->


    @include('staff.layouts.script')

    @stack('js')
    @livewireScripts

</body>

</html>
