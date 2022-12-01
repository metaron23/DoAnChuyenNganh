@extends('client.share.master')

@section('content')
    <div id="menu_client">
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--18">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Thực đơn</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="/home">Trang chủ</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                    <span class="breadcrumb-item active">Thực đơn</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Menu Grid Area -->
        <div class="container">
            <div class="col-md-4 p-0 mt--30">
                <div class="food__search">
                    <div class="serch__box">
                        <input type="text" placeholder="Tìm món">
                        <i class="fa fa-search"></i>
                    </div>
                    <div id="content_search" class="search-result" hidden>

                    </div>
                </div>
            </div>
        </div>
        <section class="food__menu__grid__area section-padding--lg" style="padding-top: 0">
            <div class="container">
                <div class="row mt--30">
                    <div class="col-lg-12">
                        <div class="food__nav nav nav-tabs">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="food__pagination d-flex mt--30">

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="  col-lg-12">
                        <div class="fd__tab__content tab-content" id="nav-tabContent">
                            <!-- Start Single Content -->
                            <div class="food__list__tab__content tab-pane fade show active" id="nav-all" role="tabpanel">

                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- End Menu Grid Area -->
    @include('client.share.footer')
@endsection

@section('js')
    <script src="/js/client/menu.js"></script>
@endsection
