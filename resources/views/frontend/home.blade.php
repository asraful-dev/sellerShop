@extends('layouts.frontend')
@section('content-frontend')
@section('title')
Nagadonlineshop Ecommerce
@endsection
<style>
   .carousel-inner {
   height: 250px; /* Adjust height here as per your requirement */
   }
   .carousel-item img,
   .carousel-item iframe {
   max-height: 100%;
   object-fit: cover;
   }
   .carousel-control-prev-icon, .carousel-control-next-icon {
   background-color: rgba(0, 0, 0, 0.5);
   }
   #homepage-1 .ps-product-list {
   padding-bottom: 0px;
   }
   #homepage-1 .ps-deal-of-day {
   padding-bottom: 24px;
   }
   #homepage-9 .ps-home-blog {
   margin-bottom: -59px;
   padding-top: 0px;
   }
   .ps-best-sale-brands {
   padding-bottom: 60px;
   }
   #homepage-9 .ps-site-features {
   padding: 36px 0;
   }
   .ps-deal-of-day .ps-section__header {
   margin-bottom: 65px;
   padding: 16px 20px;
   display: flex;
   flex-flow: row nowrap;
   justify-content: space-between;
   align-items: center;
   background-color: #f4f4f4;
   border-bottom: 1px solid #e3e3e3;
   }
   .ps-product-list .ps-section__header {
   padding: 10px 20px;
   background-color: #0958a5;
   border-bottom: 1px solid #fff;
   }
   #homepage-9 .ps-product-list .ps-section__header h3 {
   font-size: 20px;
   color: #fff;
   }
   .ps-product-list .ps-section__links li a {
   color: #fff;
   }
   .ps-deal-of-day .ps-section__header {
   margin-bottom: 45px;
   }
   .ps-product-list .ps-section__content {
   padding-top: 30px;
   }
   .ps-deal-of-day .ps-section__header {
   padding: 8px 20px;
   background-color: #0958a5;
   border-bottom: 1px solid #fff;
   }
   .ps-block--countdown-deal .ps-block__left h3 {
   margin-bottom: 0;
   font-size: 24px;
   font-weight: 400;
   margin-right: 70px;
   color: #fff;
   }
   .ps-product-list .ps-section__links li a {
   color: #fff;
   }
   .ps-deal-of-day .ps-section__header>a {
   color: #fff;
   border-bottom: 1px solid #fff;
   }
   .ps-product__badge2{
   position: absolute;
   top: 0;
   left: 0;
   color: #fff;
   font-size: 14px;
   font-weight: 600;
   line-height: 20px;
   padding: 5px 10px;
   border-radius: 4px;
   background-color: #f14705;
   font-size: 12px !important;
   }
   .hot_deals_container .owl-item:hover{
   margin-bottom: 80px;
   }
   .disabled{
   display: none;
   }
   .carousel-item {
   height: 250px; /* Adjust height here as per your requirement */
   }
   .carousel-item img,
   .carousel-item iframe {
   max-height: 100%;
   object-fit: cover;
   }
</style>
<style>
   .countdown-timer {
      padding: 50px 0;
      display: flex;
      justify-content: center;
      gap: 30px;
   }

   .countdown-item {
      position: relative;
      display: inline-block;
   }

   .countdown-circle {
      background: radial-gradient(circle at center, #ff4d4d, #990000);
      color: #fff;
      border-radius: 50%;
      width: 150px;
      height: 150px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
      position: relative;
      animation: shake 1s infinite;
   }

   .countdown-danger {
      background: radial-gradient(circle at center, #ff0000, #cc0000);
   }

   .countdown-circle:before {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.2);
      border-radius: 50%;
      width: 90%;
      height: 90%;
      z-index: -1;
      box-shadow: inset 0 0 30px rgba(0, 0, 0, 0.6);
   }

   .countdown-number {
      font-size: 48px;
      font-weight: bold;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.8);
   }

   .countdown-label {
      font-size: 16px;
      text-transform: uppercase;
      font-weight: 600;
      margin-top: 10px;
   }

   /* Shake Animation */
   @keyframes shake {
      0%, 100% {
         transform: rotate(0deg);
      }
      25% {
         transform: rotate(-5deg);
      }
      50% {
         transform: rotate(5deg);
      }
      75% {
         transform: rotate(-5deg);
      }
   }
</style>

<div id="homepage-1">
   <!-- home slider/banner show -->
   <div class="ps-home-banner ps-home-banner--1">
      <div class="ps-container">
         <style>
            @media only screen and (max-width: 600px) {
            .slider_image {
            height: auto;
            }
            .slider_image {
            height: auto;
            }
            #homepage-1 .ps-home-banner .owl-slider {
            max-width: 100%;
            height: auto !important;
            }
            /* #homepage-1 .ps-home-banner .ps-section__left {
            padding-right: 30px;
            max-width: calc(100% - 299px) !important;
            } */
            /* #homepage-1 .ps-top-categories {
            padding: 10px 0 50px !important;
            } */
            .owl-carousel .owl-item img {
            width: 100% important;
            }
            #hot_deals_slides{
            height: auto !important;
            max-width: 100% !important;
            }
            }
         </style>
         <div class="ps-section__left">
            <div class="ps-carousel--nav-inside second owl-slider" data-owl-auto="true" data-owl-loop="true"
               data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1"
               data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"
               data-owl-duration="1000" data-owl-mousedrag="on">
               @foreach ($sliders as $slider)
               <a href="#">
               <img class="slider_image" src="{{ asset($slider->slider_img) }}" alt="">
               </a>
               @endforeach
            </div>
         </div>
         <div class="ps-section__right">
            @foreach ($latest_banner as $banner)
            <a class="ps-collection" href="#" style="padding-bottom: 5px !important;">
            <img class="slider_image" src="{{ asset($banner->banner_image) }}" alt="">
            </a>
            @endforeach
         </div>
      </div>
   </div>
   <!-- todays deals product show -->
   @if (count($today_deals) > 0)
   <div class="ps-deal-of-day">
      <div class="ps-container">
         <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3>Deals of the day</h3>
               </div>
            </div>
            <a href="{{ route('product.view.all') }}">View all</a>
         </div>
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
               data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
               data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4"
               data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
               @foreach ($today_deals as $product)
               <div class="ps-product ps-product--inner">
                  <div class="ps-product__thumbnail">
                     @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                     <a href="{{ route('product.details', $product->slug) }}">
                     <img src="{{ asset($product->product_thumbnail) }}" alt="" />
                     </a>
                     @else
                     <img class="img-lg mb-3" src="{{ asset('upload/no_image.jpg') }}"
                        alt="" />
                     @endif
                     <a class="ps-product__vendor mt-3" href="#">
                     @if (session()->get('language') == 'bangla')
                     {{ $product->category->category_name_bn ?? 'NULL' }}
                     @else
                     {{ $product->category->category_name_en ?? 'NULL' }}
                     @endif
                     </a>
                     @php
                     if ($product->discount_type == 1) {
                     $price_after_discount = $product->regular_price - $product->discount_price;
                     } elseif ($product->discount_type == 2) {
                     $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                     }
                     @endphp
                     @if ($product->discount_price > 0)
                     @if ($product->discount_type == 1)
                     <div class="ps-product__badge">৳{{ $product->discount_price }} off</div>
                     @elseif($product->discount_type == 2)
                     <div class="ps-product__badge">{{ $product->discount_price }}% off</div>
                     @endif
                     @endif
                     <ul class="ps-product__actions">
                        @if ($product->is_varient == 1)
                        <!--<li>-->
                        <!--    <a href="#" id="{{ $product->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#product-quickview" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a>-->
                        <!--</li>-->
                        <!-- start varient product add to cart direct -->
                        <li>
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <a onclick="addToCartDirect({{ $product->id }})" data-placement="top"
                              title="Add To Cart" style="cursor:pointer;"><i
                              class="icon-bag2"></i></a>
                        </li>
                        <!-- end varient product add to cart direct -->
                        <li>
                           <a href="#" id="{{ $product->id }}"
                              onclick="productView(this.id)" data-placement="top"
                              title="Quick View" data-toggle="modal"
                              data-target="#product-quickview"><i class="icon-eye"></i>
                           </a>
                        </li>
                        @else
                        <!-- start not varient product add to cart direct -->
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id" value="{{ $product->id }}"
                           min="1">
                        <input type="hidden" id="{{ $product->id }}-product_pname"
                           value="{{ $product->name_en }}">
                        <li>
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"><i class="icon-bag2"
                              style="cursor:pointer;"></i></a>
                        </li>
                        <!-- end not varient product add to cart direct -->
                        <!--<li>-->
                        <!--    <a  onclick="addToCartDirect({{ $product->id }})" data-placement="top" title="Quick View"><i class="icon-eye" style="cursor:pointer;"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                        @endif
                        <li>
                           <a href="#" data-toggle="tooltip" data-placement="top"
                              title="Add to Whishlist"><i class="icon-heart"></i></a>
                        </li>
                        <li><a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})"
                           data-toggle="tooltip" data-placement="top" title="Compare"><i
                           class="icon-chart-bars"></i></a></li>
                     </ul>
                  </div>
                  @php
                  if ($product->discount_type == 1) {
                  $price_after_discount = $product->regular_price - $product->discount_price;
                  } elseif ($product->discount_type == 2) {
                  $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                  }
                  @endphp
                  <div class="ps-product__container">
                     @if ($product->discount_price > 0)
                     <p class="ps-product__price sale">
                        ৳{{ $price_after_discount }}
                        <del>৳ {{ $product->regular_price }}</del>
                        @if ($product->discount_price > 0)
                        @if ($product->discount_type == 1)
                        <small>৳{{ $product->discount_price }} off</small>
                        @elseif($product->discount_type == 2)
                        <small>{{ $product->discount_price }}% off</small>
                        @endif
                        @endif
                     </p>
                     @else
                     <p class="ps-product__price sale">
                        ৳{{ $product->regular_price }}
                     </p>
                     @endif
                     {{-- 
                     <p>{{ $product->product_point }}</p>
                     --}}
                     <div class="ps-product__content">
                        @if (session()->get('language') == 'bangla')
                        <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                        {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                        @else
                        <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                        {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                        @endif
                        @php
                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->latest()
                        ->get();
                        $avarage = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->avg('rating');
                        @endphp
                        <div class="ps-product__rating">
                      
                           @if ($product->is_varient == 1)
                           <!-- start varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <!-- end varient product add to cart direct -->
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @else
                           <!-- start not varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   @endif

   <!-- featured category show -->
   @if (count($featured_category) > 0)
   <div class="ps-top-categories" style="padding: 10px 0 0px !important;">
      <div class="ps-container">
         <h3>Featured Categories</h3>
         <div class="row">
            @foreach ($featured_category as $category)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
               <div class="ps-block--category">
                  <a class="ps-block__overlay"
                     href="{{ route('product.category', $category->slug) }}"></a>
                  <img src="{{ asset($category->category_image) }}" alt="">
                  <p>
                     @if (session()->get('language') == 'bangla')
                     {{ Str::limit($category->category_name_bn, 14) }}
                     @else
                     {{ Str::limit($category->category_name_en, 14) }}
                     @endif
                  </p>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   @endif
   @php
   $featured_banner = App\Models\Banner::where('status', 1);
   @endphp
   <!-- collection banner show -->
   <div class="ps-home-ads" style="margin-bottom:30px;">
      <div class="ps-container">
         <div class="row">
            @foreach ($featured_banner->skip(2)->take(3)->get() as $banner)
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection"
               href="#"><img width="530" height="285"
               src="{{ asset($banner->banner_image) }}" alt=""></a>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   
   <div class="container mt-5">
      <!-- Countdown Timer -->
      <div class="countdown-timer d-flex justify-content-center">
         <div class="countdown-item text-center mx-3">
            <div class="countdown-circle countdown-danger countdown-animated">
               <span class="countdown-number" id="days1">00</span>
               <span class="countdown-label">Days</span>
            </div>
         </div>
         <div class="countdown-item text-center mx-3">
            <div class="countdown-circle countdown-danger countdown-animated">
               <span class="countdown-number" id="hours1">00</span>
               <span class="countdown-label">Hours</span>
            </div>
         </div>
         <div class="countdown-item text-center mx-3">
            <div class="countdown-circle countdown-danger countdown-animated">
               <span class="countdown-number" id="minutes1">00</span>
               <span class="countdown-label">Minutes</span>
            </div>
         </div>
         <div class="countdown-item text-center mx-3">
            <div class="countdown-circle countdown-danger countdown-animated">
               <span class="countdown-number" id="seconds1">00</span>
               <span class="countdown-label">Seconds</span>
            </div>
         </div>
      </div>
   
      <!-- Banner Section -->
      <div class="banner mt-4 d-flex justify-content-center align-items-center" style="height: 400px;">
         <img src="https://via.placeholder.com/1200x400/000000/ffffff?text=Life+Ending+Soon" class="img-fluid" alt="Banner">
      </div>
   </div>

   <div class="container mt-5">
      <!-- Countdown Timer -->
      <div class="countdown-timer d-flex justify-content-center">
         <div class="countdown-item text-center mx-3">
            <div class="countdown-circle countdown-danger countdown-animated">
               <span class="countdown-number" id="days">00</span>
               <span class="countdown-label">Days</span>
            </div>
         </div>
         <div class="countdown-item text-center mx-3">
            <div class="countdown-circle countdown-danger countdown-animated">
               <span class="countdown-number" id="hours">00</span>
               <span class="countdown-label">Hours</span>
            </div>
         </div>
         <div class="countdown-item text-center mx-3">
            <div class="countdown-circle countdown-danger countdown-animated">
               <span class="countdown-number" id="minutes">00</span>
               <span class="countdown-label">Minutes</span>
            </div>
         </div>
         <div class="countdown-item text-center mx-3">
            <div class="countdown-circle countdown-danger countdown-animated">
               <span class="countdown-number" id="seconds">00</span>
               <span class="countdown-label">Sec</span>
            </div>
         </div>
      </div>
      
      <div class="row">
         <!-- Left Photo Carousel -->
         <div class="col-md-3">
            <div id="photoCarouselLeft" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#photoCarouselLeft" data-slide-to="0" class="active"></li>
                  <li data-target="#photoCarouselLeft" data-slide-to="1"></li>
                  <li data-target="#photoCarouselLeft" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner h-100">
                  <div class="carousel-item active">
                     <img src="https://via.placeholder.com/250x250/ff5733/ffffff?text=Colorful+1" class="d-block w-100 img-fluid" alt="Colorful Photo 1">
                  </div>
                  <div class="carousel-item">
                     <img src="https://via.placeholder.com/250x250/33ff57/ffffff?text=Colorful+2" class="d-block w-100 img-fluid" alt="Colorful Photo 2">
                  </div>
                  <div class="carousel-item">
                     <img src="https://via.placeholder.com/250x250/3357ff/ffffff?text=Colorful+3" class="d-block w-100 img-fluid" alt="Colorful Photo 3">
                  </div>
               </div>
            </div>
         </div>
         <!-- Middle Video Carousel -->
         <div class="col-md-6">
            <div id="videoCarousel" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#videoCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#videoCarousel" data-slide-to="1"></li>
                  <li data-target="#videoCarousel" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen></iframe>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2Vv-BfVoq4g" allowfullscreen></iframe>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Right Photo Carousel -->
         <div class="col-md-3">
            <div id="photoCarouselRight" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#photoCarouselRight" data-slide-to="0" class="active"></li>
                  <li data-target="#photoCarouselRight" data-slide-to="1"></li>
                  <li data-target="#photoCarouselRight" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner h-100">
                  <div class="carousel-item active">
                     <img src="https://via.placeholder.com/250x250/ff33a2/ffffff?text=Colorful+4" class="d-block w-100 img-fluid" alt="Colorful Photo 4">
                  </div>
                  <div class="carousel-item">
                     <img src="https://via.placeholder.com/250x250/33aaff/ffffff?text=Colorful+5" class="d-block w-100 img-fluid" alt="Colorful Photo 5">
                  </div>
                  <div class="carousel-item">
                     <img src="https://via.placeholder.com/250x250/ffaa33/ffffff?text=Colorful+6" class="d-block w-100 img-fluid" alt="Colorful Photo 6">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   
   <!-- featured product show -->
   <div class="ps-product-list ps-clothings">
      <div class="ps-container">
         @if(count($hot_deals_slider) > 0)
         <div class="ps-carousel--nav-inside second owl-slider mb-5" data-owl-auto="true" data-owl-loop="true"
            data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1"
            data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"
            data-owl-duration="1000" data-owl-mousedrag="on">
            @foreach ($hot_deals_slider as $slider)
            <a href="#">
            <img class="slider_image " id="hot_deals_slides" style="margin: 0 auto !important;"  src="{{ asset($slider->slider_img) }}" alt="">  
            </a>
            @endforeach
         </div>
         @endif
         @if (count($hot_deals_product) > 0)
         <!-- featured product show -->
         <div class="ps-product-list ps-clothings">
            <div class="ps-container hot_deals_container">
               <div class="ps-section__header">
                  <h3>Hot Deals Product </h3>
                  <ul class="ps-section__links">
                     <li><a href="{{ route('product.view.all') }}">View All</a></li>
                  </ul>
               </div>
               <div class="ps-section__content">
                  <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
                     data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                     data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                     data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on" style="margin-bottom:30px;">
                     @include('frontend.common.hot_deals_product_grid_view')
                  </div>
               </div>
            </div>
         </div>
         @endif
      </div>
   </div>
   
   <!-- hot deals product show -->
   @if (count($hot_deals_product) > 0)
   <div class="ps-deal-of-day d-none">
      <div class="ps-container">
         <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3>Hot Deals</h3>
               </div>
            </div>
            <a href="{{ route('product.view.all') }}">View all</a>
         </div>
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
               data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
               data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4"
               data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
               @forelse($hot_deals_product as $product)
               <div class="ps-product ps-product--inner">
                  <div class="ps-product__thumbnail">
                     @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                     <a href="{{ route('product.details', $product->slug) }}">
                     <img src="{{ asset($product->product_thumbnail) }}" alt="" />
                     </a>
                     @else
                     <img class="img-lg mb-3" src="{{ asset('upload/no_image.jpg') }}"
                        alt="" />
                     @endif
                     <a class="ps-product__vendor mt-3" href="#">
                     @if (session()->get('language') == 'bangla')
                     {{ $product->category->category_name_bn ?? 'NULL' }}
                     @else
                     {{ $product->category->category_name_en ?? 'NULL' }}
                     @endif
                     </a>
                     @php
                     if ($product->discount_type == 1) {
                     $price_after_discount = $product->regular_price - $product->discount_price;
                     } elseif ($product->discount_type == 2) {
                     $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                     }
                     @endphp
                     @if ($product->discount_price > 0)
                     @if ($product->discount_type == 1)
                     <div class="ps-product__badge">৳{{ $product->discount_price }} off</div>
                     @elseif($product->discount_type == 2)
                     <div class="ps-product__badge">{{ $product->discount_price }}% off</div>
                     @endif
                     @endif
                     <ul class="ps-product__actions">
                        @if ($product->is_varient == 1)
                        <!--<li>-->
                        <!--    <a href="#" id="{{ $product->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#product-quickview" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a>-->
                        <!--</li>-->
                        <!-- start varient product add to cart direct -->
                        <li>
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"
                              style="cursor:pointer;"><i class="icon-bag2"></i></a>
                        </li>
                        <!-- end varient product add to cart direct -->
                        <li>
                           <a href="#" id="{{ $product->id }}"
                              onclick="productView(this.id)" data-placement="top"
                              title="Quick View" data-toggle="modal"
                              data-target="#product-quickview"><i class="icon-eye"></i>
                           </a>
                        </li>
                        @else
                        <!-- start not varient product add to cart direct -->
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id"
                           value="{{ $product->id }}" min="1">
                        <input type="hidden" id="{{ $product->id }}-product_pname"
                           value="{{ $product->name_en }}">
                        <li>
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"><i class="icon-bag2"
                              style="cursor:pointer;"></i></a>
                        </li>
                        <!-- end not varient product add to cart direct -->
                        <!--<li>-->
                        <!--    <a  onclick="addToCartDirect({{ $product->id }})" data-placement="top" title="Quick View"><i class="icon-eye" style="cursor:pointer;"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                        @endif
                        <li>
                           <a href="#" data-toggle="tooltip" data-placement="top"
                              title="Add to Whishlist"><i class="icon-heart"></i></a>
                        </li>
                        <li><a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})"
                           data-toggle="tooltip" data-placement="top" title="Compare"><i
                           class="icon-chart-bars"></i></a></li>
                     </ul>
                  </div>
                  @php
                  if ($product->discount_type == 1) {
                  $price_after_discount = $product->regular_price - $product->discount_price;
                  } elseif ($product->discount_type == 2) {
                  $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                  }
                  @endphp
                  <div class="ps-product__container">
                     @if ($product->discount_price > 0)
                     <p class="ps-product__price sale">
                        ৳{{ $price_after_discount }}
                        <del>৳ {{ $product->regular_price }}</del>
                        @if ($product->discount_price > 0)
                        @if ($product->discount_type == 1)
                        <small>৳{{ $product->discount_price }} off</small>
                        @elseif($product->discount_type == 2)
                        <small>{{ $product->discount_price }}% off</small>
                        @endif
                        @endif
                     </p>
                     @else
                     <p class="ps-product__price sale">
                        ৳{{ $product->regular_price }}
                     </p>
                     @endif
                     {{-- 
                     <p>{{ $product->product_point }}</p>
                     --}}
                     <div class="ps-product__content">
                        @if (session()->get('language') == 'bangla')
                        <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                        {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                        @else
                        <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                        {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                        @endif
                        @php
                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->latest()
                        ->get();
                        $avarage = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->avg('rating');
                        @endphp
                        <div class="ps-product__rating">
                         
                           @if ($product->is_varient == 1)
                           <!-- start varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <!-- end varient product add to cart direct -->
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @else
                           <!-- start not varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               @empty
               <h5 class="text-danger">No Product Found</h5>
               @endforelse
            </div>
         </div>
      </div>
   </div>
   @endif
   <!--Gadget 1st category to product show -->
   @if (count($skip_product_0) > 0)
   <div class="ps-deal-of-day">
      <div class="ps-container">
         <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3>
                     @if (session()->get('language') == 'bangla')
                     {{ $skip_category_0->category_name_bn ?? 'Null' }}
                     @else
                     {{ $skip_category_0->category_name_en ?? 'Null' }}
                     @endif
                  </h3>
               </div>
            </div>
            <a href="{{ route('product.view.all') }}">View all</a>
         </div>
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
               data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
               data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4"
               data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
               @forelse($skip_product_0 as $product)
               <div class="ps-product ps-product--inner">
                  <div class="ps-product__thumbnail">
                     @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                     <a href="{{ route('product.details', $product->slug) }}">
                     <img src="{{ asset($product->product_thumbnail) }}" alt="" />
                     </a>
                     @else
                     <img class="img-lg mb-3" src="{{ asset('upload/no_image.jpg') }}"
                        alt="" />
                     @endif
                     <a class="ps-product__vendor mt-3" href="#">
                     @if (session()->get('language') == 'bangla')
                     {{ $product->category->category_name_bn ?? 'NULL' }}
                     @else
                     {{ $product->category->category_name_en ?? 'NULL' }}
                     @endif
                     </a>
                     @php
                     if ($product->discount_type == 1) {
                     $price_after_discount = $product->regular_price - $product->discount_price;
                     } elseif ($product->discount_type == 2) {
                     $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                     }
                     @endphp
                     @if ($product->discount_price > 0)
                     @if ($product->discount_type == 1)
                     <div class="ps-product__badge">৳{{ $product->discount_price }} off</div>
                     @elseif($product->discount_type == 2)
                     <div class="ps-product__badge">{{ $product->discount_price }}% off</div>
                     @endif
                     @endif
                     <ul class="ps-product__actions">
                        @if ($product->is_varient == 1)
                        <!--<li>-->
                        <!--    <a href="#" id="{{ $product->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#product-quickview" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a>-->
                        <!--</li>-->
                        <!-- start varient product add to cart direct -->
                        <li>
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"
                              style="cursor:pointer;"><i class="icon-bag2"></i></a>
                        </li>
                        <!-- end varient product add to cart direct -->
                        <li>
                           <a href="#" id="{{ $product->id }}"
                              onclick="productView(this.id)" data-placement="top"
                              title="Quick View" data-toggle="modal"
                              data-target="#product-quickview"><i class="icon-eye"></i>
                           </a>
                        </li>
                        @else
                        <!-- start not varient product add to cart direct -->
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id"
                           value="{{ $product->id }}" min="1">
                        <input type="hidden" id="{{ $product->id }}-product_pname"
                           value="{{ $product->name_en }}">
                        <li>
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"><i class="icon-bag2"
                              style="cursor:pointer;"></i></a>
                        </li>
                        <!-- end not varient product add to cart direct -->
                        <!--<li>-->
                        <!--    <a  onclick="addToCartDirect({{ $product->id }})" data-placement="top" title="Quick View"><i class="icon-eye" style="cursor:pointer;"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                        @endif
                        <li>
                           <a href="#" data-toggle="tooltip" data-placement="top"
                              title="Add to Whishlist"><i class="icon-heart"></i></a>
                        </li>
                        <li><a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})"
                           data-toggle="tooltip" data-placement="top" title="Compare"><i
                           class="icon-chart-bars"></i></a></li>
                     </ul>
                  </div>
                  @php
                  if ($product->discount_type == 1) {
                  $price_after_discount = $product->regular_price - $product->discount_price;
                  } elseif ($product->discount_type == 2) {
                  $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                  }
                  @endphp
                  <div class="ps-product__container">
                     @if (session()->get('language') == 'bangla')
                     <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                     {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                     @else
                     <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                     {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                     @endif
                     @if ($product->discount_price > 0)
                     <p class="ps-product__price sale">
                        ৳{{ $price_after_discount }}
                        <del>৳ {{ $product->regular_price }}</del>
                        @if ($product->discount_price > 0)
                        @if ($product->discount_type == 1)
                        <small>৳{{ $product->discount_price }} off</small>
                        @elseif($product->discount_type == 2)
                        <small>{{ $product->discount_price }}% off</small>
                        @endif
                        @endif
                     </p>
                     @else
                     <p class="ps-product__price sale">
                        ৳{{ $product->regular_price }}
                     </p>
                     @endif
                     {{-- 
                     <p>{{ $product->product_point }}</p>
                     --}}
                     <div class="ps-product__content">
                        @php
                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->latest()
                        ->get();
                        $avarage = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->avg('rating');
                        @endphp
                        <div class="ps-product__rating">
                         
                           @if ($product->is_varient == 1)
                           <!-- start varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <!-- end varient product add to cart direct -->
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @else
                           <!-- start not varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               @empty
               <h5 class="text-danger">No Product Found</h5>
               @endforelse
            </div>
         </div>
      </div>
   </div>
   @endif
   <!--HouseHold 2nd category to product show -->
   @if (count($skip_product_2) > 0)
   <div class="ps-deal-of-day">
      <div class="ps-container">
         <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3>
                     @if (session()->get('language') == 'bangla')
                     {{ $skip_category_2->category_name_bn ?? 'Null' }}
                     @else
                     {{ $skip_category_2->category_name_en ?? 'Null' }}
                     @endif
                  </h3>
               </div>
            </div>
            <a href="{{ route('product.view.all') }}">View all</a>
         </div>
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
               data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
               data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4"
               data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
               @forelse($skip_product_2 as $product)
               <div class="ps-product ps-product--inner">
                  <div class="ps-product__thumbnail">
                     @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                     <a href="{{ route('product.details', $product->slug) }}">
                     <img src="{{ asset($product->product_thumbnail) }}" alt="" />
                     </a>
                     @else
                     <img class="img-lg mb-3" src="{{ asset('upload/no_image.jpg') }}"
                        alt="" />
                     @endif
                     <a class="ps-product__vendor mt-3" href="#">
                     @if (session()->get('language') == 'bangla')
                     {{ $product->category->category_name_bn ?? 'NULL' }}
                     @else
                     {{ $product->category->category_name_en ?? 'NULL' }}
                     @endif
                     </a>
                     @php
                     if ($product->discount_type == 1) {
                     $price_after_discount = $product->regular_price - $product->discount_price;
                     } elseif ($product->discount_type == 2) {
                     $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                     }
                     @endphp
                     @if ($product->discount_price > 0)
                     @if ($product->discount_type == 1)
                     <div class="ps-product__badge">৳{{ $product->discount_price }} off</div>
                     @elseif($product->discount_type == 2)
                     <div class="ps-product__badge">{{ $product->discount_price }}% off</div>
                     @endif
                     @endif
                     <ul class="ps-product__actions">
                        @if ($product->is_varient == 1)
                      
                        <li>
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"
                              style="cursor:pointer;"><i class="icon-bag2"></i></a>
                        </li>
                        <!-- end varient product add to cart direct -->
                        <li>
                           <a href="#" id="{{ $product->id }}"
                              onclick="productView(this.id)" data-placement="top"
                              title="Quick View" data-toggle="modal"
                              data-target="#product-quickview"><i class="icon-eye"></i>
                           </a>
                        </li>
                        @else
                        <!-- start not varient product add to cart direct -->
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id"
                           value="{{ $product->id }}" min="1">
                        <input type="hidden" id="{{ $product->id }}-product_pname"
                           value="{{ $product->name_en }}">
                        <li>
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"><i class="icon-bag2"
                              style="cursor:pointer;"></i></a>
                        </li>
                        <!-- end not varient product add to cart direct -->
                        <!--<li>-->
                        <!--    <a  onclick="addToCartDirect({{ $product->id }})" data-placement="top" title="Quick View"><i class="icon-eye" style="cursor:pointer;"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                        @endif
                        <li>
                           <a href="#" data-toggle="tooltip" data-placement="top"
                              title="Add to Whishlist"><i class="icon-heart"></i></a>
                        </li>
                        <li><a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})"
                           data-toggle="tooltip" data-placement="top" title="Compare"><i
                           class="icon-chart-bars"></i></a></li>
                     </ul>
                  </div>
                  @php
                  if ($product->discount_type == 1) {
                  $price_after_discount = $product->regular_price - $product->discount_price;
                  } elseif ($product->discount_type == 2) {
                  $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                  }
                  @endphp
                  <div class="ps-product__container">
                     @if ($product->discount_price > 0)
                     <p class="ps-product__price sale">
                        ৳{{ $price_after_discount }}
                        <del>৳ {{ $product->regular_price }}</del>
                        @if ($product->discount_price > 0)
                        @if ($product->discount_type == 1)
                        <small>৳{{ $product->discount_price }} off</small>
                        @elseif($product->discount_type == 2)
                        <small>{{ $product->discount_price }}% off</small>
                        @endif
                        @endif
                     </p>
                     @else
                     <p class="ps-product__price sale">
                        ৳{{ $product->regular_price }}
                     </p>
                     @endif
                     {{-- 
                     <p>{{ $product->product_point }}</p>
                     --}}
                     <div class="ps-product__content">
                        @if (session()->get('language') == 'bangla')
                        <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                        {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                        @else
                        <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                        {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                        @endif
                        @php
                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->latest()
                        ->get();
                        $avarage = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->avg('rating');
                        @endphp
                        <div class="ps-product__rating">
                          
                           @if ($product->is_varient == 1)
                           <!-- start varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <!-- end varient product add to cart direct -->
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @else
                           <!-- start not varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               @empty
               <h5 class="text-danger">No Product Found</h5>
               @endforelse
            </div>
         </div>
      </div>
   </div>
   @endif
   <!-- second Gadget  category to product show -->
   @if (count($category_education) > 0)
   <div class="ps-deal-of-day">
      <div class="ps-container">
         <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3>
                     @if (session()->get('language') == 'bangla')
                     {{ $skip_category_edu->category_name_bn ?? 'Null' }}
                     @else
                     {{ $skip_category_edu->category_name_en ?? 'Null' }}
                     @endif
                  </h3>
               </div>
            </div>
            <a href="{{ route('product.view.all') }}">View all</a>
         </div>
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
               data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
               data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4"
               data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
               @forelse($category_education as $product)
               <div class="ps-product ps-product--inner">
                  <div class="ps-product__thumbnail">
                     @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                     <a href="{{ route('product.details', $product->slug) }}">
                     <img src="{{ asset($product->product_thumbnail) }}" alt="" />
                     </a>
                     @else
                     <img class="img-lg mb-3" src="{{ asset('upload/no_image.jpg') }}"
                        alt="" />
                     @endif
                     <a class="ps-product__vendor mt-3" href="#">
                     @if (session()->get('language') == 'bangla')
                     {{ $product->category->category_name_bn ?? 'NULL' }}
                     @else
                     {{ $product->category->category_name_en ?? 'NULL' }}
                     @endif
                     </a>
                     @php
                     if ($product->discount_type == 1) {
                     $price_after_discount = $product->regular_price - $product->discount_price;
                     } elseif ($product->discount_type == 2) {
                     $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                     }
                     @endphp
                     @if ($product->discount_price > 0)
                     @if ($product->discount_type == 1)
                     <div class="ps-product__badge">৳{{ $product->discount_price }} off</div>
                     @elseif($product->discount_type == 2)
                     <div class="ps-product__badge">{{ $product->discount_price }}% off</div>
                     @endif
                     @endif
                     <ul class="ps-product__actions">
                        @if ($product->is_varient == 1)
                        <!--<li>-->
                        <!--    <a href="#" id="{{ $product->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#product-quickview" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a>-->
                        <!--</li>-->
                        <!-- start varient product add to cart direct -->
                        <li>
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"
                              style="cursor:pointer;"><i class="icon-bag2"></i></a>
                        </li>
                        <!-- end varient product add to cart direct -->
                        <li>
                           <a href="#" id="{{ $product->id }}"
                              onclick="productView(this.id)" data-placement="top"
                              title="Quick View" data-toggle="modal"
                              data-target="#product-quickview"><i class="icon-eye"></i>
                           </a>
                        </li>
                        @else
                        <!-- start not varient product add to cart direct -->
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id"
                           value="{{ $product->id }}" min="1">
                        <input type="hidden" id="{{ $product->id }}-product_pname"
                           value="{{ $product->name_en }}">
                        <li>
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"><i class="icon-bag2"
                              style="cursor:pointer;"></i></a>
                        </li>
                        <!-- end not varient product add to cart direct -->
                        <!--<li>-->
                        <!--    <a  onclick="addToCartDirect({{ $product->id }})" data-placement="top" title="Quick View"><i class="icon-eye" style="cursor:pointer;"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                        @endif
                        <li>
                           <a href="#" data-toggle="tooltip" data-placement="top"
                              title="Add to Whishlist"><i class="icon-heart"></i></a>
                        </li>
                        <li><a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})"
                           data-toggle="tooltip" data-placement="top" title="Compare"><i
                           class="icon-chart-bars"></i></a></li>
                     </ul>
                  </div>
                  @php
                  if ($product->discount_type == 1) {
                  $price_after_discount = $product->regular_price - $product->discount_price;
                  } elseif ($product->discount_type == 2) {
                  $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                  }
                  @endphp
                  <div class="ps-product__container">
                     @if (session()->get('language') == 'bangla')
                     <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                     {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                     @else
                     <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                     {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                     @endif
                     @if ($product->discount_price > 0)
                     <p class="ps-product__price sale">
                        ৳{{ $price_after_discount }}
                        <del>৳ {{ $product->regular_price }}</del>
                        @if ($product->discount_price > 0)
                        @if ($product->discount_type == 1)
                        <small>৳{{ $product->discount_price }} off</small>
                        @elseif($product->discount_type == 2)
                        <small>{{ $product->discount_price }}% off</small>
                        @endif
                        @endif
                     </p>
                     @else
                     <p class="ps-product__price sale">
                        ৳{{ $product->regular_price }}
                     </p>
                     @endif
                     {{-- 
                     <p>{{ $product->product_point }}</p>
                     --}}
                     <div class="ps-product__content">
                        @php
                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->latest()
                        ->get();
                        $avarage = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->avg('rating');
                        @endphp
                        <div class="ps-product__rating">
                           <!-- <span>01</span> -->
                           @if ($product->is_varient == 1)
                           <!-- start varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <!-- end varient product add to cart direct -->
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @else
                           <!-- start not varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               @empty
               <h5 class="text-danger">No Product Found</h5>
               @endforelse
            </div>
         </div>
      </div>
   </div>
   @endif
   <!-- 3rd category to product show -->
   @if (count($skip_product_7) > 0)
   <div class="ps-deal-of-day">
      <div class="ps-container">
         <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3>
                     @if (session()->get('language') == 'bangla')
                     {{ $skip_category_7->category_name_bn ?? 'Null' }}
                     @else
                     {{ $skip_category_7->category_name_en ?? 'Null' }}
                     @endif
                  </h3>
               </div>
            </div>
            <a href="{{ route('product.view.all') }}">View all</a>
         </div>
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
               data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
               data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4"
               data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
               @forelse($skip_product_7 as $product)
               <div class="ps-product ps-product--inner">
                  <div class="ps-product__thumbnail">
                     @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                     <a href="{{ route('product.details', $product->slug) }}">
                     <img src="{{ asset($product->product_thumbnail) }}" alt="" />
                     </a>
                     @else
                     <img class="img-lg mb-3" src="{{ asset('upload/no_image.jpg') }}"
                        alt="" />
                     @endif
                     <a class="ps-product__vendor mt-3" href="#">
                     @if (session()->get('language') == 'bangla')
                     {{ $product->category->category_name_bn ?? 'NULL' }}
                     @else
                     {{ $product->category->category_name_en ?? 'NULL' }}
                     @endif
                     </a>
                     @php
                     if ($product->discount_type == 1) {
                     $price_after_discount = $product->regular_price - $product->discount_price;
                     } elseif ($product->discount_type == 2) {
                     $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                     }
                     @endphp
                     @if ($product->discount_price > 0)
                     @if ($product->discount_type == 1)
                     <div class="ps-product__badge">৳{{ $product->discount_price }} off</div>
                     @elseif($product->discount_type == 2)
                     <div class="ps-product__badge">{{ $product->discount_price }}% off</div>
                     @endif
                     @endif
                     <ul class="ps-product__actions">
                        @if ($product->is_varient == 1)
                        <!--<li>-->
                        <!--    <a href="#" id="{{ $product->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#product-quickview" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a>-->
                        <!--</li>-->
                        <!-- start varient product add to cart direct -->
                        <li>
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"
                              style="cursor:pointer;"><i class="icon-bag2"></i></a>
                        </li>
                        <!-- end varient product add to cart direct -->
                        <li>
                           <a href="#" id="{{ $product->id }}"
                              onclick="productView(this.id)" data-placement="top"
                              title="Quick View" data-toggle="modal"
                              data-target="#product-quickview"><i class="icon-eye"></i>
                           </a>
                        </li>
                        @else
                        <!-- start not varient product add to cart direct -->
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id"
                           value="{{ $product->id }}" min="1">
                        <input type="hidden" id="{{ $product->id }}-product_pname"
                           value="{{ $product->name_en }}">
                        <li>
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"><i class="icon-bag2"
                              style="cursor:pointer;"></i></a>
                        </li>
                        <!-- end not varient product add to cart direct -->
                        <!--<li>-->
                        <!--    <a  onclick="addToCartDirect({{ $product->id }})" data-placement="top" title="Quick View"><i class="icon-eye" style="cursor:pointer;"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                        @endif
                        <li>
                           <a href="#" data-toggle="tooltip" data-placement="top"
                              title="Add to Whishlist"><i class="icon-heart"></i></a>
                        </li>
                        <li><a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})"
                           data-toggle="tooltip" data-placement="top" title="Compare"><i
                           class="icon-chart-bars"></i></a></li>
                     </ul>
                  </div>
                  @php
                  if ($product->discount_type == 1) {
                  $price_after_discount = $product->regular_price - $product->discount_price;
                  } elseif ($product->discount_type == 2) {
                  $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                  }
                  @endphp
                  <div class="ps-product__container">
                     @if ($product->discount_price > 0)
                     <p class="ps-product__price sale">
                        ৳{{ $price_after_discount }}
                        <del>৳ {{ $product->regular_price }}</del>
                        @if ($product->discount_price > 0)
                        @if ($product->discount_type == 1)
                        <small>৳{{ $product->discount_price }} off</small>
                        @elseif($product->discount_type == 2)
                        <small>{{ $product->discount_price }}% off</small>
                        @endif
                        @endif
                     </p>
                     @else
                     <p class="ps-product__price sale">
                        ৳{{ $product->regular_price }}
                     </p>
                     @endif
                     {{-- 
                     <p>{{ $product->product_point }}</p>
                     --}}
                     <div class="ps-product__content">
                        @if (session()->get('language') == 'bangla')
                        <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                        {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                        @else
                        <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                        {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                        @endif
                        @php
                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->latest()
                        ->get();
                        $avarage = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->avg('rating');
                        @endphp
                        <div class="ps-product__rating">
                           {{-- 
                           <select class="ps-rating" data-read-only="true">
                              @if ($avarage == 0)
                              @elseif($avarage == 1 || $avarage < 2)
                              <option value="1">1</option>
                              <option value="2">1</option>
                              <option value="2">1</option>
                              <option value="2">1</option>
                              <option value="2">1</option>
                              @elseif($avarage == 2 || $avarage < 3)
                              <option value="1">1</option>
                              <option value="1">1</option>
                              <option value="2">1</option>
                              <option value="2">1</option>
                              <option value="2">1</option>
                              @elseif($avarage == 3 || $avarage < 4)
                              <option value="1">1</option>
                              <option value="1">1</option>
                              <option value="1">1</option>
                              <option value="2">1</option>
                              <option value="2">1</option>
                              @elseif($avarage == 4 || $avarage < 5)
                              <option value="1">1</option>
                              <option value="1">1</option>
                              <option value="1">1</option>
                              <option value="1">1</option>
                              <option value="2">1</option>
                              @elseif($avarage == 5 || $avarage < 5)
                              <option value="1">1</option>
                              <option value="1">1</option>
                              <option value="1">1</option>
                              <option value="1">1</option>
                              <option value="1">1</option>
                              @endif
                           </select>
                           <span>({{ count($reviewcount) }})</span> --}}
                           <!-- <span>01</span> -->
                           @if ($product->is_varient == 1)
                           <!-- start varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <!-- end varient product add to cart direct -->
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @else
                           <!-- start not varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               @empty
               <h5 class="text-danger">No Product Found</h5>
               @endforelse
            </div>
         </div>
      </div>
   </div>
   @endif
   <!-- 3rd category to product show -->
   @if (count($skip_product_7) > 0)
   <div class="ps-deal-of-day">
      <div class="ps-container">
         <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3>
                     @if (session()->get('language') == 'bangla')
                     {{ $skip_category_7->category_name_bn ?? 'Null' }}
                     @else
                     {{ $skip_category_7->category_name_en ?? 'Null' }}
                     @endif
                  </h3>
               </div>
            </div>
            <a href="{{ route('product.view.all') }}">View all</a>
         </div>
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
               data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
               data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4"
               data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
               @forelse($skip_product_7 as $product)
               <div class="ps-product ps-product--inner">
                  <div class="ps-product__thumbnail">
                     @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                     <a href="{{ route('product.details', $product->slug) }}">
                     <img src="{{ asset($product->product_thumbnail) }}" alt="" />
                     </a>
                     @else
                     <img class="img-lg mb-3" src="{{ asset('upload/no_image.jpg') }}"
                        alt="" />
                     @endif
                     <a class="ps-product__vendor mt-3" href="#">
                     @if (session()->get('language') == 'bangla')
                     {{ $product->category->category_name_bn ?? 'NULL' }}
                     @else
                     {{ $product->category->category_name_en ?? 'NULL' }}
                     @endif
                     </a>
                     @php
                     if ($product->discount_type == 1) {
                     $price_after_discount = $product->regular_price - $product->discount_price;
                     } elseif ($product->discount_type == 2) {
                     $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                     }
                     @endphp
                     @if ($product->discount_price > 0)
                     @if ($product->discount_type == 1)
                     <div class="ps-product__badge">৳{{ $product->discount_price }} off</div>
                     @elseif($product->discount_type == 2)
                     <div class="ps-product__badge">{{ $product->discount_price }}% off</div>
                     @endif
                     @endif
                     <ul class="ps-product__actions">
                        @if ($product->is_varient == 1)
                        <!--<li>-->
                        <!--    <a href="#" id="{{ $product->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#product-quickview" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a>-->
                        <!--</li>-->
                        <!-- start varient product add to cart direct -->
                        <li>
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"
                              style="cursor:pointer;"><i class="icon-bag2"></i></a>
                        </li>
                        <!-- end varient product add to cart direct -->
                        <li>
                           <a href="#" id="{{ $product->id }}"
                              onclick="productView(this.id)" data-placement="top"
                              title="Quick View" data-toggle="modal"
                              data-target="#product-quickview"><i class="icon-eye"></i>
                           </a>
                        </li>
                        @else
                        <!-- start not varient product add to cart direct -->
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id"
                           value="{{ $product->id }}" min="1">
                        <input type="hidden" id="{{ $product->id }}-product_pname"
                           value="{{ $product->name_en }}">
                        <li>
                           <a onclick="addToCartDirect({{ $product->id }})"
                              data-placement="top" title="Add To Cart"><i class="icon-bag2"
                              style="cursor:pointer;"></i></a>
                        </li>
                        <!-- end not varient product add to cart direct -->
                        <!--<li>-->
                        <!--    <a  onclick="addToCartDirect({{ $product->id }})" data-placement="top" title="Quick View"><i class="icon-eye" style="cursor:pointer;"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                        @endif
                        <li>
                           <a href="#" data-toggle="tooltip" data-placement="top"
                              title="Add to Whishlist"><i class="icon-heart"></i></a>
                        </li>
                        <li><a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})"
                           data-toggle="tooltip" data-placement="top" title="Compare"><i
                           class="icon-chart-bars"></i></a></li>
                     </ul>
                  </div>
                  @php
                  if ($product->discount_type == 1) {
                  $price_after_discount = $product->regular_price - $product->discount_price;
                  } elseif ($product->discount_type == 2) {
                  $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                  }
                  @endphp
                  <div class="ps-product__container">
                     @if ($product->discount_price > 0)
                     <p class="ps-product__price sale">
                        ৳{{ $price_after_discount }}
                        <del>৳ {{ $product->regular_price }}</del>
                        @if ($product->discount_price > 0)
                        @if ($product->discount_type == 1)
                        <small>৳{{ $product->discount_price }} off</small>
                        @elseif($product->discount_type == 2)
                        <small>{{ $product->discount_price }}% off</small>
                        @endif
                        @endif
                     </p>
                     @else
                     <p class="ps-product__price sale">
                        ৳{{ $product->regular_price }}
                     </p>
                     @endif
                     {{-- 
                     <p>{{ $product->product_point }}</p>
                     --}}
                     <div class="ps-product__content">
                        @if (session()->get('language') == 'bangla')
                        <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                        {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                        @else
                        <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                        {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                        @endif
                        @php
                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->latest()
                        ->get();
                        $avarage = App\Models\Review::where('product_id', $product->id)
                        ->where('status', 1)
                        ->avg('rating');
                        @endphp
                        <div class="ps-product__rating">
                        
                           @if ($product->is_varient == 1)
                           <!-- start varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <!-- end varient product add to cart direct -->
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @else
                           <!-- start not varient product add to cart direct -->
                           <input type="hidden" id="pfrom" value="direct">
                           <input type="hidden" id="product_product_id"
                              value="{{ $product->id }}" min="1">
                           <input type="hidden" id="{{ $product->id }}-product_pname"
                              value="{{ $product->name_en }}">
                           <input type="hidden" id="buyNowCheckHome" value="0">
                           <input type="hidden" id="{{ $product->id }}-product_color"
                              value="{{ $product->product_color }}">
                           <input type="hidden" id="{{ $product->id }}-product_size"
                              value="{{ $product->product_size }}">
                           <div class="d-flex">
                              <a href="#" id="{{ $product->id }}"
                                 onclick="productView(this.id)" data-toggle="modal"
                                 data-target="#product-quickview"
                                 class="btn btn-success btn-sm mt-3 btn-block ">
                              @if (session()->get('language') == 'bangla')
                              কার্টে যোগ করুন
                              @else
                              Add To Cart
                              @endif
                              </a>
                              <a onclick="buyNowHome({{ $product->id }})"
                                 class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light">
                              @if (session()->get('language') == 'bangla')
                              অর্ডার করুন
                              @else
                              Buy Now
                              @endif
                              </a>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               @empty
               <h5 class="text-danger">No Product Found</h5>
               @endforelse
            </div>
         </div>
      </div>
   </div>
   @endif
   <!-- latest blog show -->
   @if (count($latest_blog) > 0)
   <div class="ps-section--default ps-home-blog">
      <div class="ps-container">
         <div class="ps-section__header">
            <h3>News</h3>
            <ul class="ps-section__links">
               <li><a href="{{ route('product.view.all') }}">See All</a></li>
            </ul>
         </div>
         <div class="ps-section__content">
            <div class="row">
               @foreach ($latest_blog as $blog)
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                  <div class="ps-post">
                     <div class="ps-post__thumbnail">
                        <a class="ps-post__overlay"
                           href="{{ route('blog.details', $blog->blog_slug_en) }}"></a>
                        <img src="{{ asset($blog->blog_image) }}" alt="">
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <br />
            <br />
         </div>
      </div>
   </div>
   @endif
   <!-- best seller brands  show -->
   @if (count($latest_brand) > 0)
   <div class="ps-best-sale-brands ps-section--furniture d-none">
      <div class="ps-container">
         <div class="ps-section__header">
            <h3>BEST SELLER BRANDS</h3>
         </div>
         <div class="ps-section__content">
            <ul class="ps-image-list">
               @foreach ($latest_brand as $brand)
               <li>
                  <a href="#">
                  <img src="{{ asset($brand->brand_image) }}" alt="" width="114"
                     height="105">
                  </a>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
   @endif
</div>
<script>
   // Countdown Timer
   const countdownDate = new Date("Sep 15, 2024 00:00:00").getTime();
   
   function updateCountdown() {
   const now = new Date().getTime();
   const distance = countdownDate - now;
   
   const days = Math.floor(distance / (1000 * 60 * 60 * 24));
   const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
   const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
   const seconds = Math.floor((distance % (1000 * 60)) / 1000);
   
   document.getElementById('days').innerText = days;
   document.getElementById('hours').innerText = hours;
   document.getElementById('minutes').innerText = minutes;
   document.getElementById('seconds').innerText = seconds;
   }
   
   setInterval(updateCountdown, 1000);
   updateCountdown();
</script>
<script>
   // Countdown Timer 1
   const countdownDate1 = new Date("Sep 18, 2024 00:00:00").getTime();

   function updateCountdown1() {
      const now = new Date().getTime();
      const distance = countdownDate1 - now;

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById('days1').innerText = days;
      document.getElementById('hours1').innerText = hours;
      document.getElementById('minutes1').innerText = minutes;
      document.getElementById('seconds1').innerText = seconds;
   }

   setInterval(updateCountdown1, 1000);
   updateCountdown1();
</script>

@endsection