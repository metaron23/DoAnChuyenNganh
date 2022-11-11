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
    @yield('js')
</body>

</html>
