<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('client.share.head')
</head>

<body>
    <div id="load">

    </div>
    <div id="contents">
        <!-- Main wrapper -->
        <div class="wrapper" id="wrapper">
            <!-- Start Header Area -->
            @include('client.share.top')
            <!-- End Header Area -->
            @yield('content')
        </div>
        <!-- //Main wrapper -->
        <!-- JS Files -->
    </div>
    @include('client.share.js')
    @yield('footer')
    <script>
        var check = "";
    </script>
    @isset($checkNav)
        <script>
            check = {!! json_encode($checkNav, JSON_HEX_TAG) !!};
        </script>
    @endisset
    <script src="/js/client/master.js"></script>
    @yield('js')
</body>

</html>
