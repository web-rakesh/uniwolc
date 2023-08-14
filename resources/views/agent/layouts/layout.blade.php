<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | UINWOLC</title>
    @include('agent.layouts.style')
    @stack('css')
    @livewireStyles
</head>

<body>
    <!--Application Process -->
    <div class="dashboardPagSection">
        <div class="dashmenuOverlay"></div>
        @include('agent.layouts.sidebar')
        <div class="dashboardPagesWrapper">
            @include('agent.layouts.navbar')
            <div class="dashboardDtlsArea">
                @yield('content')

            </div>
        </div>
    </div>
    <!-- Application Process End -->

    @include('agent.layouts.modal')
    @include('agent.layouts.script')

    @stack('js')
    @livewireScripts

</body>

</html>
