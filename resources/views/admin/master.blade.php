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
                        <div class="row">
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
        $(document).ready(function() {
            let check = {!! json_encode($checkMenu, JSON_HEX_TAG) !!};
            let menuList = $('.sidebar-main .sidebar-list');
            for (const child of menuList) {
                if (child.getAttribute('data-id') == check) {
                    child.classList.add('active_menu');
                }
            }
        });
    </script>

    @yield('js')
</body>

</html>
