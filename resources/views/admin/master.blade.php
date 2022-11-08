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
                    child.classList.add('active_background_menu');
                    $('.sidebar-main .sidebar-list[data-id="'+check+'"]>a i').addClass('active_color_menu');
                    $('.sidebar-main .sidebar-list[data-id="'+check+'"]>a span').addClass('active_color_menu');
                }
            }
        });
    </script>

    @yield('js')
</body>

</html>
