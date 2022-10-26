@extends('client.share.master')

@section('content')
    <div id="menu">
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--18">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">menu List view</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.html">Home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                    <span class="breadcrumb-item active">menu List view</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Menu Grid Area -->
        <div class="row">
            <div class="food__search" style="width:30%;margin:20px 106px;">
                <h4 class="side__title">Search</h4>
                <div class="serch__box">
                    <input type="text" placeholder="Search keyword" v-model="keySearch" v-on:keyup="getDataSearch()">
                    <a href="#"><i class="fa fa-search"></i></a>
                </div>
                <div id="content_search"
                    style="position: absolute;z-index: 99999;background-color: #fff; width: 413px;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="row" v-for="(value, key) in dataSearch">
                        <div class="m-3 d-flex flex-row justify-content-between">
                            <a href="menu-details.html">
                                <img v-bind:src="value.hinh_anh" alt="list food images" style="width:100px" class="mr-2">
                            </a>
                            <div class="food__list__details" style="width: 134px">
                                <p><a href="menu-details.html">@{{ value.ten_mon_an }}</a></p>
                            </div>
                            <span style="font-size: 16px;margin-left: 6px">@{{ (value.don_gia_khuyen_mai == 0 ? value.don_gia_ban : value.don_gia_khuyen_mai).toLocaleString() }} VND</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="food__menu__grid__area section-padding--lg" style="padding-top: 0">
            <div class="container">

                <div class="row mt--30">
                    <div class="col-lg-12">
                        <div class="food__nav nav nav-tabs">
                            <a class="nav-tab nav-tab-all" href="" v-on:click.prevent="loadListFood(0, $event)" v-bind:data-id="0">All</a>
                            <div v-for="(value, key) in listCategoryFood">
                                <a class="nav-tab" href="" v-bind:data-id="value.id"
                                    v-on:click.prevent="loadListFood(value.id, $event)">@{{ value.ten_danh_muc }} </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt--30">
                    <div class="col-lg-12">
                        <div class="fd__tab__content tab-content" id="nav-tabContent">
                            <!-- Start Single Content -->
                            <div class="food__list__tab__content tab-pane fade show active" id="nav-all" role="tabpanel">
                                <!-- Start Single Food -->
                                <div class="single__food__list d-flex wow fadeInUp" v-for="(value,key) in listFood">
                                    <div class="food__list__thumb">
                                        <a href="#">
                                            <img v-bind:src="value.hinh_anh" alt="list food images" style="max-width:468px" v-on:click.prevent="detailFood(value.id)">
                                        </a>
                                    </div>
                                    <div class="food__list__inner d-flex align-items-center justify-content-between" style="min-width:678px">
                                        <div class="food__list__details">
                                            <h2><a href="/menu/detailFood" v-on:click.prevent="detailFood(value.id)">@{{ value.ten_mon_an }}</a></h2>
                                            <p>@{{ value.mo_ta_ngan }}</p>
                                            <div class="list__btn">
                                                <a class="food__btn grey--btn theme--hover" href="menu-details.html">Order Now</a>
                                            </div>
                                        </div>
                                        <div class="food__rating">
                                            <div class="list__food__prize">
                                                <span style="font-size: 32px">@{{ (value.don_gia_khuyen_mai == 0 ? value.don_gia_ban : value.don_gia_khuyen_mai).toLocaleString() }}</span>
                                            </div>
                                            <ul class="rating">
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
    <script>
        new Vue({
            el: '#menu',
            data: {
                listCategoryFood: [],
                listFood: [],
                totalPage: 0,
                page: 1,
                id: 0,
                keySearch: "",
                dataSearch: [],
            },
            created() {
                this.loadListCategoryFood();
                this.loadListFood(0);
            },
            methods: {
                loadListFood(id, event) {
                    this.id = id;
                    this.page = 1;
                    axios
                        .get("/menu/getFood/" + id + "?page=" + this.page)
                        .then((res) => {
                            this.listFood = res.data.listFood.data;
                            this.totalPage = res.data.listFood.last_page;
                            $('.nav-tab').removeAttr("style");
                            try {
                                event.target.setAttribute("style", "color:#d50c0d;font-weight:600;");
                            } catch {
                                $('body .nav-tab-all').attr("style", "color:#d50c0d;font-weight:600;");
                            }
                        });
                    setTimeout(function() {
                        $('.food__pagination li>a[data-id="1"]').parentsUntil("ul").addClass('active');
                    }, 2000);
                },
                loadPaginate(page, event) {
                    $('.food__pagination li').removeClass('active');
                    axios
                        .get("/menu/getFood/" + this.id + "?page=" + page)
                        .then((res) => {
                            this.listFood = res.data.listFood.data;
                            event.target.parentElement.setAttribute("class", "active");
                        });
                },
                loadListCategoryFood() {
                    axios
                        .get("/menu/category")
                        .then((res) => {
                            this.listCategoryFood = res.data.category;
                        });
                },
                getDataSearch() {
                    if (this.keySearch == "") this.keySearch = null;
                    axios
                        .get("/menu/search/" + this.keySearch)
                        .then((res) => {
                            this.dataSearch = res.data.foodSearch;
                        });
                },
                detailFood(id) {
                    axios
                        .get("/menu/detailFood/" + id)
                        .then((res) => {
                            window.location.href = "/menu/detailFood/"+id;
                        });
                },
            }
        });
    </script>
@endsection
