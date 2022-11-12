@extends('client.share.master')
<head>
    <title>Thực đơn</title>
    <link rel="stylesheet" href="/assets_client/style_client_me.css">
</head>
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
        {{-- <div class="row">
            <div class="food__search" style="width:30%;margin:20px 106px;">
                <h4 class="side__title">Tìm Kiếm </h4>
                <div class="serch__box">
                    <input type="text" placeholder="Tìm món" v-model="keySearch" v-on:keyup="getDataSearch()">
                    <a href="#"><i class="fa fa-search"></i></a>
                </div>
                <div id="content_search" class="search-result"
                   >
                    <div class="row" v-for="(value, key) in dataSearch">
                        <div class="m-3 d-flex flex-row justify-content-between">
                            <a href="#" v-on:click.prevent="detailFood(value.id)">
                                <img v-bind:src="value.hinh_anh" alt="list food images" style="width:100px" class="mr-2">
                            </a>
                            <div class="food__list__details" style="width: 134px">
                                <p><a href="#" v-on:click.prevent="detailFood(value.id)">@{{ value.ten_mon_an }}</a></p>
                            </div>
                            <span style="font-size: 16px;margin-left: 6px">@{{ (value.don_gia_khuyen_mai == 0 ? value.don_gia_ban : value.don_gia_khuyen_mai).toLocaleString() }} VND</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <section class="food__menu__grid__area section-padding--lg" style="padding-top: 0">
            <div class="container">
                <div class="row mt--30">
                    <div class="col-lg-12">
                        <div class="food__nav nav nav-tabs">

                        </div>
                    </div>
                </div>
                <div class="row mt--30">
                    <div class="  col-lg-12">
                        <div class="fd__tab__content tab-content" id="nav-tabContent">
                            <!-- Start Single Content -->
                            <div class="food__list__tab__content tab-pane fade show active" id="nav-all" role="tabpanel">
                                <!-- Start Single Food -->
                                
                                <!-- End Single Food -->
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="food__pagination d-flex justify-content-center align-items-center mt--130">
                            <li>
                                <a href="#" class="head numberpage" v-on:click.prevent="loadPaginate(1,$event)"><i
                                        class="zmdi zmdi-chevron-left"></i></a>
                            </li>
                            <li v-for="(value, key) in totalPage">
                                <a href="" class="numberpage" :data-id="value"
                                    v-on:click.prevent="loadPaginate(value,$event)">@{{ value }}</a>
                            </li>
                            <li><a href="#" class="last numberpage" v-on:click.prevent="loadPaginate(totalPage,$event)"><i
                                        class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul>
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
