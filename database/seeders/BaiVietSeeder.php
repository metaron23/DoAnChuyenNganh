<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            // DB::table('bai_viets')->insert([
            //     'tieu_de'           =>'Full Width blog post formet Standered.',
            //     'noi_dung_ngan'     =>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.',
            //     'hinh_anh'          =>'images/blog/big-img/5.jpg',
            //     'noi_dung_chi_tiet' =>'
            //                             <div class="blog__details__container">
            //                                 <div class="bl__dtl__thumb">
            //                                     <img src="images/blog/details/1.jpg" alt="big images">
            //                                 </div>
            //                                 <div class="bl__dtl__postmeta d-flex justify-content-between">
            //                                     <ul class="bl__meta d-flex align-items-center">
            //                                         <li><i class="fa fa-user-o"></i>Posted By: <a href="#">Admin</a></li>
            //                                         <li><i class="fa fa-calendar-o"></i>February  13,  2018</li>
            //                                     </ul>
            //                                     <ul class="bl__like__comment d-flex">
            //                                         <li><a href="#"><i class="fa fa-comment-o"></i>05</a></li>
            //                                         <li><a href="#"><i class="fa fa-heart-o"></i>07</a></li>
            //                                     </ul>
            //                                 </div>
            //                                 <!-- Start Blog Details -->
            //                                 <div class="bl__details__inner">
            //                                     <div class="bl__details__content">
            //                                         <span>Category : Pasta</span>
            //                                         <h2>standard blog post format for Design.</h2>
            //                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labor dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ualiqui comi modo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillumfugiat nu pariatur.Excepteur sint occaecat cupidatat non proident,</p>
            //                                         <ul class="food__sm__blog d-flex">
            //                                             <li><a href="#"><img src="images/blog/details/2.jpg" alt="blog images"></a></li>
            //                                             <li><a href="#"><img src="images/blog/details/3.jpg" alt="blog images"></a></li>
            //                                         </ul>
            //                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labor dolore magna aliqua. Ut enim  minim veniam, “quis nostrud exercitation ullamco laboris nisi ut aliqui ”modo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillumfugiat nu pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,</p>
            //                                         <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris ahj</blockquote>
            //                                         <p>Est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
            //                                         <div class="rel__blog__list d-flex align-items-start justify-content-between">
            //                                             <ul class="sm__bl__list">
            //                                                 <li><a href="#">Duis aute irure dolor in reprehenderit in voluptat</a></li>
            //                                                 <li><a href="#">Duis aute irure dolor in reprehenderit in voluptat</a></li>
            //                                                 <li><a href="#">Duis aute irure dolor in reprehenderit in voluptat</a></li>
            //                                                 <li><a href="#">Duis aute irure dolor in reprehenderit in voluptat</a></li>
            //                                                 <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing</a></li>
            //                                             </ul>
            //                                             <div class="sm__blog__thumb">
            //                                                 <a href="#">
            //                                                     <img src="images/blog/details/4.jpg" alt="blog images">
            //                                                 </a>
            //                                             </div>
            //                                         </div>
            //                                         <p>o consequat. Duis aute irure dolor in reprehenderit in voluptate vel  cillumfugiat pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunmollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque st laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptaccusantium doloremquequisquam est, qui dolorem ipsum quia dolor sit ametquaerat voluptatem.</p>
            //                                         <div class="bl__share d-flex">
            //                                             <span>Share by:</span>
            //                                             <ul class="blog__social__net d-flex">
            //                                                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            //                                                 <li><a href="#"><i class="fa fa-google"></i></a></li>
            //                                                 <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            //                                                 <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            //                                             </ul>
            //                                         </div>
            //                                     </div>
            //                                     <!-- Start Blog Author -->
            //                                     <div class="blog__author">
            //                                         <h2 class="blog__title">about author</h2>
            //                                         <div class="food__author d-flex flex-wrap flex-lg-nowrap flex-md-nowrap">
            //                                             <div class="author__thumb">
            //                                                 <img src="images/blog/details/5.jpg" alt="author images">
            //                                             </div>
            //                                             <div class="author__details">
            //                                                 <h2><a href="#">Robart Hanson</a></h2>
            //                                                 <div class="author__meta d-flex justify-content-between">
            //                                                     <span>Admin - February  13,  2018</span>
            //                                                     <ul class="rating d-flex">
            //                                                         <li><i class="zmdi zmdi-star"></i></li>
            //                                                         <li><i class="zmdi zmdi-star"></i></li>
            //                                                         <li><i class="zmdi zmdi-star"></i></li>
            //                                                         <li><i class="zmdi zmdi-star"></i></li>
            //                                                         <li><i class="zmdi zmdi-star"></i></li>
            //                                                     </ul>
            //                                                 </div>
            //                                                 <p>Lorem ipsum dolor sit amet, consectetur adip icinelit,tdom ineiusd tempor incididunt ut labore et dolore magna aliqua. Ut e veniam, nostrud exercitation ullamco laboris nisi ut aliquiconsequat.</p>
            //                                                 <ul class="author__link d-flex">
            //                                                     <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            //                                                     <li><a href="#"><i class="fa fa-google"></i></a></li>
            //                                                     <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            //                                                     <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            //                                                 </ul>
            //                                             </div>
            //                                         </div>
            //                                     </div>
            //                                     <!-- End Blog Author -->

            //                                     <!-- Start Blog Comment -->
            //                                     <div class="blog__comment__wrapper">
            //                                         <h2 class="blog__title">comment’s</h2>
            //                                         <div class="blog__comment__inner">
            //                                             <!-- Start Single Comment -->
            //                                             <div class="comment d-flex flex-wrap flex-md-nowrap flex-lg-nowrap">
            //                                                 <div class="commnet__thumb">
            //                                                     <img src="images/comment/1.jpg" alt="comment images">
            //                                                 </div>
            //                                                 <div class="comment__details">
            //                                                     <h5>Robart Hanson</h5>
            //                                                     <div class="cmment__date d-flex justify-content-between">
            //                                                         <span>February  13,  2018</span>
            //                                                         <ul class="rating d-flex">
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                         </ul>
            //                                                     </div>
            //                                                     <p>Lorem ipsum dolor sit amet, consectetur adipis icing incididunt labore et dolore magna aliqua. Ut enim adm veniam, quis nostrud exercitation.</p>
            //                                                     <ul class="reply__btn d-flex justify-content-start justify-content-md-end justify-content-lg-end">
            //                                                         <li><a href="#"><i class="fa fa-reply"></i></a></li>
            //                                                         <li><a href="#"><i class="fa fa-angle-up"></i></a></li>
            //                                                         <li><a href="#"><i class="fa fa-angle-down"></i></a></li>
            //                                                     </ul>
            //                                                 </div>
            //                                             </div>
            //                                             <!-- End Single Comment -->
            //                                             <!-- Start Single Comment -->
            //                                             <div class="comment d-flex flex-wrap flex-md-nowrap flex-lg-nowrap comment__reply">
            //                                                 <div class="commnet__thumb">
            //                                                     <img src="images/comment/2.jpg" alt="comment images">
            //                                                 </div>
            //                                                 <div class="comment__details">
            //                                                     <h5>Irin Pervin</h5>
            //                                                     <div class="cmment__date d-flex justify-content-between">
            //                                                         <span>February  13,  2018</span>
            //                                                         <ul class="rating d-flex">
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                         </ul>
            //                                                     </div>
            //                                                     <p>Lorem ipsum dolor sit amet, consectetur adipis icing incididunt labore et dolore magna aliqua. Ut enim adm veniam, quis nostrud exercitation.</p>
            //                                                     <ul class="reply__btn d-flex justify-content-start justify-content-md-end justify-content-lg-end">
            //                                                         <li><a href="#"><i class="fa fa-reply"></i></a></li>
            //                                                         <li><a href="#"><i class="fa fa-angle-up"></i></a></li>
            //                                                         <li><a href="#"><i class="fa fa-angle-down"></i></a></li>
            //                                                     </ul>
            //                                                 </div>
            //                                             </div>
            //                                             <!-- End Single Comment -->
            //                                             <!-- Start Single Comment -->
            //                                             <div class="comment d-flex flex-wrap flex-md-nowrap flex-lg-nowrap">
            //                                                 <div class="commnet__thumb">
            //                                                     <img src="images/comment/3.jpg" alt="comment images">
            //                                                 </div>
            //                                                 <div class="comment__details">
            //                                                     <h5>Najnin Supa</h5>
            //                                                     <div class="cmment__date d-flex justify-content-between">
            //                                                         <span>February  13,  2018</span>
            //                                                         <ul class="rating d-flex">
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                             <li><i class="zmdi zmdi-star"></i></li>
            //                                                         </ul>
            //                                                     </div>
            //                                                     <p>Lorem ipsum dolor sit amet, consectetur adipis icing incididunt labore et dolore magna aliqua. Ut enim adm veniam, quis nostrud exercitation.</p>
            //                                                     <ul class="reply__btn d-flex justify-content-start justify-content-md-end justify-content-lg-end">
            //                                                         <li><a href="#"><i class="fa fa-reply"></i></a></li>
            //                                                         <li><a href="#"><i class="fa fa-angle-up"></i></a></li>
            //                                                         <li><a href="#"><i class="fa fa-angle-down"></i></a></li>
            //                                                     </ul>
            //                                                 </div>
            //                                             </div>
            //                                             <!-- End Single Comment -->
            //                                         </div>
            //                                     </div>
            //                                     <!-- End Blog Comment -->
            //                                     <!-- Start Comment Form -->
            //                                     <div class="blog__comment__form">
            //                                         <h2 class="blog__title">leave A Comment</h2>
            //                                         <div class="comment__form">
            //                                             <div class="ct__form__box d-flex flex-wrap flex-lg-nowrap flex-md-nowrap">
            //                                                 <input type="text" placeholder="First name *">
            //                                                 <input type="text" placeholder="Last Name *">
            //                                             </div>
            //                                             <div class="ct__form__box d-flex flex-wrap flex-lg-nowrap flex-md-nowrap">
            //                                                 <input type="email" placeholder="E-mail *">
            //                                                 <input type="text" placeholder="Phone *">
            //                                             </div>
            //                                             <div class="ct__form__box">
            //                                                 <textarea name="message" placeholder="Your Message"></textarea>
            //                                             </div>
            //                                             <div class="comment__btn">
            //                                                 <a class="food__btn" href="#">submit</a>
            //                                             </div>
            //                                         </div>
            //                                     </div>
            //                                     <!-- End Comment Form -->
            //                                 </div>
            //                                 <!-- End Blog Details -->
            //                             </div>
            //     ',
            //     'id_nguoi_dang'     =>'2',
            //     'ten_nguoi_dang'    =>'Thanh Hùng',
            //     'id_danh_muc'       =>'6',
            //     'ten_danh_muc'      =>'Món Ăn Sáng',
            // ]);

            factory(App\Models\Supplier::class, 1000)->create();
    }
}
