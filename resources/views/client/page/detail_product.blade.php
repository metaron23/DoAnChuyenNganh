@extends('client.share.master')

@section('content')
    <div id="detailFood">
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--18">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Menu Details</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.html">Home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                    <span class="breadcrumb-item active">Menu Details</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Blog List View Area -->
        <section class="blog__list__view section-padding--lg menudetails-right-sidebar bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="food__menu__container">
                            <div class="food__menu__inner d-flex flex-wrap flex-md-nowrap flex-lg-nowrap">
                                <div class="food__menu__thumb">
                                    <img v-bind:src="detailFood.hinh_anh" alt="images" width="380px">
                                </div>
                                <div class="food__menu__details">
                                    <div class="food__menu__content">
                                        <h2>@{{ detailFood.ten_mon_an }}</h2>
                                        <ul class="food__dtl__prize d-flex">
                                            <li class="old__prize">@{{ detailFood.don_gia_ban.toLocaleString() }}VND</li>
                                            <li>@{{ detailFood.don_gia_khuyen_mai.toLocaleString() }}VND</li>
                                        </ul>
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <p v-html="detailFood.mo_ta_ngan"></p>
                                        <div class="product-action-wrap">
                                            <div class="prodict-statas"><span>Food Type : @{{ detailFood.ten_danh_muc }}</span></div>
                                            <div class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input type="number" value="1" min="1" v-model="amountCart">
                                                    <div class="add__to__cart__btn">
                                                        <a class="food__btn" v-bind:href="linkDetailFood" v-on:click="update(detailFood)">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Product Descrive Area -->
                            <div class="menu__descrive__area">
                                <div class="menu__nav nav nav-tabs" role="tablist">
                                    <a class="active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab">Description</a>
                                    <a id="nav-breakfast-tab" data-toggle="tab" href="#nav-breakfast" role="tab">Reviews</a>
                                </div>
                                <!-- Start Tab Content -->
                                <div class="menu__tab__content tab-content" id="nav-tabContent">
                                    <!-- Start Single Content -->
                                    <div class="single__dec__content fade show active" id="nav-all" role="tabpanel" v-html="detailFood.mo_ta_chi_tiet">
                                    </div>
                                    <!-- End Single Content -->
                                    <!-- Start Single Content -->
                                    <div class="single__dec__content fade" id="nav-breakfast" role="tabpanel">
                                        <div class="review__wrapper">
                                            <!-- Start Single Review -->
                                            <div class="single__review d-flex">
                                                <div class="review__thumb">
                                                    <img src="/assets_client/images/testimonial/rev/1.jpg" alt="review images">
                                                </div>
                                                <div class="review__details">
                                                    <h3>Robart Hanson</h3>
                                                    <div class="rev__meta d-flex justify-content-between">
                                                        <span>Admin - February 13, 2018</span>
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipis icing elit, sed tdomino eiusd tempor incididunt ut
                                                        labore et dolore magna aliqua. Ut e veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                        aliquiconsequat.</p>
                                                </div>
                                            </div>
                                            <!-- End Single Review -->
                                            <!-- Start Single Review -->
                                            <div class="single__review d-flex">
                                                <div class="review__thumb">
                                                    <img src="/assets_client/images/testimonial/rev/2.jpg" alt="review images">
                                                </div>
                                                <div class="review__details">
                                                    <h3>Robart Hanson</h3>
                                                    <div class="rev__meta d-flex justify-content-between">
                                                        <span>Admin - February 13, 2018</span>
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        </ul>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipis icing eltempor incididunt labore et dolore magna
                                                        aliqua.
                                                        Ut enim adm veniam, quis nostrud exercitation.</p>
                                                </div>
                                            </div>
                                            <!-- End Single Review -->
                                        </div>
                                    </div>
                                    <!-- End Single Content -->
                                </div>
                                <!-- End Tab Content -->
                            </div>
                            <!-- End Product Descrive Area -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="popupal__menu">
                                    <h4>Popular Menu</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row mt--30">
                            <!-- Start Single Product -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="beef_product">
                                    <div class="beef__thumb">
                                        <a href="menu-details.html">
                                            <img src="/assets_client/images/beef/1.jpg" alt="beef images">
                                        </a>
                                    </div>
                                    <div class="beef__hover__info">
                                        <div class="beef__hover__inner">
                                            <span>Special</span>
                                            <span>offer</span>
                                        </div>
                                    </div>
                                    <div class="beef__details">
                                        <h4><a href="menu-details.html">Beef Burger</a></h4>
                                        <ul class="beef__prize">
                                            <li class="old__prize">$30</li>
                                            <li>$30</li>
                                        </ul>
                                        <p>erve armesan may be added to the top of apLem ip, consectetur</p>
                                        <div class="beef__cart__btn">
                                            <a href="cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="beef_product">
                                    <div class="beef__thumb">
                                        <a href="menu-details.html">
                                            <img src="/assets_client/images/beef/2.jpg" alt="beef images">
                                        </a>
                                    </div>
                                    <div class="beef__details">
                                        <h4><a href="menu-details.html">Beef Burger</a></h4>
                                        <ul class="beef__prize">
                                            <li class="old__prize">$30</li>
                                            <li>$30</li>
                                        </ul>
                                        <p>erve armesan may be added to the top of apLem ip, consectetur</p>
                                        <div class="beef__cart__btn">
                                            <a href="cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="beef_product">
                                    <div class="beef__thumb">
                                        <a href="menu-details.html">
                                            <img src="/assets_client/images/beef/3.jpg" alt="beef images">
                                        </a>
                                    </div>
                                    <div class="beef__hover__info">
                                        <div class="beef__hover__inner">
                                            <span>Special</span>
                                            <span>offer</span>
                                        </div>
                                    </div>
                                    <div class="beef__details">
                                        <h4><a href="menu-details.html">Beef Burger</a></h4>
                                        <ul class="beef__prize">
                                            <li class="old__prize">$30</li>
                                            <li>$30</li>
                                        </ul>
                                        <p>erve armesan may be added to the top of apLem ip, consectetur</p>
                                        <div class="beef__cart__btn">
                                            <a href="cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 md--mt--40 sm--mt--40">
                        <div class="food__sidebar">
                            <!-- Start Search Area -->
                            <div class="food__search">
                                <h4 class="side__title">Search</h4>
                                <div class="serch__box">
                                    <input type="text" placeholder="Search keyword">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <!-- End Search Area -->
                            <!-- Start Recent Post -->
                            <div class="food__recent__post mt--60">
                                <h4 class="side__title">Recent Posts</h4>
                                <div class="recent__post__wrap">
                                    <!-- Start Single Post -->
                                    <div class="single__recent__post d-flex">
                                        <div class="recent__post__thumb">
                                            <a href="blog-details.html">
                                                <img src="/assets_client/images/blog/sm-img/4.jpg" alt="post images">
                                            </a>
                                        </div>
                                        <div class="recent__post__details">
                                            <span>February 13, 2018</span>
                                            <h4><a href="blog-details.html">Diffrent title gose here. This is demo title.</a></h4>
                                        </div>
                                    </div>
                                    <!-- End Single Post -->
                                    <!-- Start Single Post -->
                                    <div class="single__recent__post d-flex">
                                        <div class="recent__post__thumb">
                                            <a href="blog-details.html">
                                                <img src="/assets_client/images/blog/sm-img/5.jpg" alt="post images">
                                            </a>
                                        </div>
                                        <div class="recent__post__details">
                                            <span>February 13, 2018</span>
                                            <h4><a href="blog-details.html">Diffrent title gose here. This is demo title.</a></h4>
                                        </div>
                                    </div>
                                    <!-- End Single Post -->
                                    <!-- Start Single Post -->
                                    <div class="single__recent__post d-flex">
                                        <div class="recent__post__thumb">
                                            <a href="blog-details.html">
                                                <img src="/assets_client/images/blog/sm-img/6.jpg" alt="post images">
                                            </a>
                                        </div>
                                        <div class="recent__post__details">
                                            <span>February 13, 2018</span>
                                            <h4><a href="blog-details.html">Diffrent title gose here. This is demo title.</a></h4>
                                        </div>
                                    </div>
                                    <!-- End Single Post -->
                                    <!-- Start Single Post -->
                                    <div class="single__recent__post d-flex">
                                        <div class="recent__post__thumb">
                                            <a href="blog-details.html">
                                                <img src="/assets_client/images/blog/sm-img/7.jpg" alt="post images">
                                            </a>
                                        </div>
                                        <div class="recent__post__details">
                                            <span>February 13, 2018</span>
                                            <h4><a href="blog-details.html">Diffrent title gose here. This is demo title.</a></h4>
                                        </div>
                                    </div>
                                    <!-- End Single Post -->
                                </div>
                            </div>
                            <!-- End Recent Post -->
                            <!-- Start Category Area -->
                            <div class="food__category__area mt--60">
                                <h4 class="side__title">Categories</h4>
                                <ul class="food__category">
                                    <li><a href="#">Maxican Food <span>(20)</span></a></li>
                                    <li><a href="#">Pizza <span>(30)</span></a></li>
                                    <li><a href="#">Food & Beverage <span>(40)</span></a></li>
                                    <li><a href="#">Maxican Food <span>(50)</span></a></li>
                                    <li><a href="#">Asian Twist <span>(60)</span></a></li>
                                    <li><a href="#">Taco Food <span>(20)</span></a></li>
                                </ul>
                            </div>
                            <!-- End Category Area -->
                            <!-- Start Sidebar Contact -->

                            <!-- End Sidebar Contact -->
                            <!-- Start Sidebar Newsletter -->

                            <!-- End Sidebar Instagram -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog List View Area -->
    </div>
@endsection

@section('js')
    <script>
        new Vue({
            el: '#detailFood',
            data: {
                detailFood: [],
                amountCart: 1,
                linkDetailFood: "",
            },
            created() {
                this.getdetailFood();
            },
            methods: {
                getdetailFood() {
                    this.detailFood = {!! json_encode($detailFood, JSON_HEX_TAG) !!};

                },
                update(value) {
                    value['so_luong_mua'] = this.amountCart;
                    axios
                        .post('/customer/cart/addCartFromDetail', value)
                        .then((res) => {
                            this.linkDetailFood = "/menu/detailFood/"+value.id;
                            if(res.data.status) toastr.success('Thêm vào giỏ hàng thành công!');
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
            }
        });
    </script>
@endsection
