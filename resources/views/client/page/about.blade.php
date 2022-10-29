@extends('client.share.master')

@section('content')
    <!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Start Header Area -->

        <!-- End Header Area -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--20">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center brad__white">
                                <h2 class="bradcaump-title">Thông tin</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="/home">Trang chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                  <span class="breadcrumb-item active">thông tin</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start About Us Area  -->

        <!-- End About Us Area  -->

        <!-- Start Accordion Area -->
        <section class="food__acconrdion__area bg--white section-padding--lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="section__title title__style--2 service__align--center">
                            <h2 class="title__line">Giới thiệu về B-restaurant</h2>
                            <p>Quy trình dịch vụ của chúng tôi</p>
                        </div>
                    </div>
                </div>
                <div class="row mt--80 pb--60">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div id="accordion" class="food_accordion" role="tablist">
                            <div class="card">
                                <div class="acc-header" role="tab" id="headingOne">
                                  <h5>
                                        <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne"><span>1.</span> Lịch sử thành lập ?</a>
                                  </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magaliqua. oenim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duidolreprehendevoluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecupidatat proident, sunt in culpa qui officideserunt mollitanim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium d sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labor fqa cabfm szdt jkasp faq havrtm
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="acc-header" role="tab" id="headingTwo">
                                  <h5>
                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>2.</span>Những chi nhánh hiện có của B-restaurant ?.
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                  <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magaliqua. oenim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duidolreprehendevoluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecupidatat proident, sunt in culpa qui officideserunt mollitanim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium d sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labor fqa cabfm szdt jkasp faq havrtm
                                  </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="acc-header" role="tab" id="headingThree">
                                  <h5>
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
                                        <span>3.</span>Những chương trình ưu đãi sẽ có trong năm ?.
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magaliqua. oenim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duidolreprehendevoluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecupidatat proident, sunt in culpa qui officideserunt mollitanim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium d sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labor fqa cabfm szdt jkasp faq havrtm
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Accordion Area -->


            <!-- Cartbox -->

	</div><!-- //Main wrapper -->

    <!-- End Menu Grid Area -->
    @include('client.share.footer')
@endsection


