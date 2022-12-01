<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.share.head')
</head>

<body>
    <div id="load"></div>
    <div id="contents">
        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-sidebar" id="pageWrapper">
            <!-- Page Header Start-->
            @include('admin.share.top')
            <!-- Page Header Ends-->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page Sidebar Start-->
                @include('admin.share.menu')
                <!-- Page Sidebar Ends-->
                <div class="page-body">
                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                @include('admin.share.foot')
            </div>
        </div>
        @include('admin.share.bottom')
    </div>
    <script src="/js/app.js"></script>
    <script>
        var check = {!! json_encode($checkMenu,JSON_HEX_TAG) !!};
    </script>
    <script src="/js/admin/master.js"></script>
    @yield('js')
</body>

</html>
