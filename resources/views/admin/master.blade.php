<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.share.head')
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
        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page Header Start-->
            @include('admin.share.top')
            <!-- Page Header Ends-->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page Sidebar Start-->
                @include('admin.share.menu')
                <!-- Page Sidebar Ends-->
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-title">
                            @yield('title')
                        </div>
                    </div>
                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        <div class="row second-chart-list third-news-update">
                            @yield('content')
                        </div>
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                @include('admin.share.foot')
            </div>
        </div>
        @include('admin.share.bottom')
    </div>
    <script src="\js\app.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        document.onreadystatechange = function() {
            var state = document.readyState;
            if (state == 'complete') {
                document.getElementById('load').style.visibility = "hidden";
                document.getElementById('contents').style.visibility = "visible";
            }
        }
    </script>

    @yield('js')

</body>

</html>
