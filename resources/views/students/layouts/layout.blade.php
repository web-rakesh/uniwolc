<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | UINWOLC</title>
    @include('students.layouts.style')
    @livewireStyles
    @stack('css')
</head>

<body>
    <!--Application Process -->
    <div class="dashboardPagSection">
        <div class="dashmenuOverlay"></div>
        @include('students.layouts.sidebar')
        <div class="dashboardPagesWrapper">
            @include('students.layouts.navbar')
            <div class="dashboardDtlsArea">
                @yield('content')

            </div>
        </div>
    </div>
    <!-- Application Process End -->

    <!-- Loader -->
    <div id="loader" class="lds-dual-ring hidden overlay"></div>
    <!-- Loader End -->
    @include('students.layouts.script')

    @stack('js')
    @livewireScripts


</body>

</html>
