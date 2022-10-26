<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('client.share.head')
    <style>
        #load {
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 9999;
            background: url("/assets_client/images/load.gif") no-repeat center center rgba(0, 0, 0, 0.25);
            background-size: 4%;
        }

        #contents {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div id="load"></div>
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
<script>
    document.onreadystatechange = function() {
        var state = document.readyState;
        if (state == 'complete') {
            document.getElementById('load').style.visibility = "hidden";
            document.getElementById('contents').style.visibility = "visible";
        }
    }
</script>

</html>
