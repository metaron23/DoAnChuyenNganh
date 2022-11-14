@extends('client.share.master')

@section('content')
    <div class="ht__bradcaump__area bg-image--18">
        <div class="ht__bradcaump__wrap d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">giỏ hàng</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="/home">trang chủ</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                <span class="breadcrumb-item active">giỏ hàng</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-main-area section-padding--lg bg--white">
        <div class="container">

        </div>
    </div>
@endsection

@section('footer')
    @include('client.share.footer')
@endsection

@section('js')
    <script src="/js/client/cart.js"></script>
@endsection
