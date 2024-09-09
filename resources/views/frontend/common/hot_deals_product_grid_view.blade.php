 <style>
   .countdown-wrapper {
        position: absolute;
        bottom:10px;
        background-color: rgba(0, 0, 0, 0.6);
        color: #fff;
        border-radius: 5px;
        font-size: 14px;
    }
    .countdown-bar {
        background-color: #444;
        padding: 10px;
        border-radius: 5px;
    }
    .countdown-time {
        display: flex;
        justify-content: space-between;
    }
    .countdown-segment {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 5px;
    }
    .count-value {
        font-size: 18px;
        font-weight: bold;
        color: #e02252;
        margin-bottom: 2px;
    }
    .count-label {
        font-size: 10px;
        color: #fff;
    }
         
</style>
        
@foreach($hot_deals_product as $product)
    <div class="ps-product">
        <div class="ps-product__thumbnail">
            @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                <a href="{{ route('product.details', $product->slug) }}">
                    <img src="{{ asset($product->product_thumbnail) }}" alt="" />
                </a>
            @else
                <img class="img-lg mb-3" src="{{ asset('upload/no_image.jpg') }}" alt="" />
            @endif

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
                    <div class="countdown-wrapper" id="countdown_{{ $product->id }}">
                     <div class="countdown-bar">
                         <div class="countdown-time">
                             <div class="countdown-segment">
                                 <span id="days_{{ $product->id }}" class="count-value">00</span>
                                 <span class="count-label">দিন</span>
                             </div>
                             <div class="countdown-segment">
                                 <span id="hours_{{ $product->id }}" class="count-value">00</span>
                                 <span class="count-label">ঘন্টা</span>
                             </div>
                             <div class="countdown-segment">
                                 <span id="minutes_{{ $product->id }}" class="count-value">00</span>
                                 <span class="count-label">মিনিট</span>
                             </div>
                             <div class="countdown-segment">
                                 <span id="seconds_{{ $product->id }}" class="count-value">00</span>
                                 <span class="count-label">সেকেন্ড</span>
                             </div>
                         </div>
                     </div>
                 </div>
                @elseif($product->discount_type == 2)
                    <div class="ps-product__badge">{{ $product->discount_price }}% off</div>
                @endif
            @endif
            <ul class="ps-product__actions">
                @if ($product->is_varient == 1)
     
                    <li>
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id" value="{{ $product->id }}" min="1">
                        <input type="hidden" id="{{ $product->id }}-product_pname" value="{{ $product->name_en }}">
                        <a onclick="addToCartDirect({{ $product->id }})" data-placement="top" title="Add To Cart"
                            style="cursor:pointer;"><i class="icon-bag2"></i></a>
                    </li>
                   
                    <li>
                        <a href="#" id="{{ $product->id }}" onclick="productView(this.id)" data-placement="top"
                            title="Quick View" data-toggle="modal" data-target="#product-quickview"><i
                                class="icon-eye"></i>
                        </a>
                    </li>
                @else
                
                    <input type="hidden" id="pfrom" value="direct">
                    <input type="hidden" id="product_product_id" value="{{ $product->id }}" min="1">
                    <input type="hidden" id="{{ $product->id }}-product_pname" value="{{ $product->name_en }}">

                    <li>
                        <a onclick="addToCartDirect({{ $product->id }})" data-placement="top" title="Add To Cart"
                            style="cursor:pointer;"><i class="icon-bag2"></i></a>
                    </li>
                   
                @endif
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i
                            class="icon-heart"></i></a></li>
                <li><a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})" data-toggle="tooltip"
                        data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
            </ul>
        </div>
        <div class="ps-product__container">
            <a class="ps-product__vendor" href="#">
                @if (session()->get('language') == 'bangla')
                    {{ $product->category->category_name_bn ?? 'NULL' }}
                @else
                    {{ $product->category->category_name_en ?? 'NULL' }}
                @endif
            </a>

            <div class="ps-product__content">
                <a class="ps-product__title" href="{{ route('product.details', $product->slug) }}">
                    @if (session()->get('language') == 'bangla')
                        <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                        {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                    @else
                        <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                        {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
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
                    <p class="ps-product__price sale">
                        ৳{{ $price_after_discount }}
                        <del>৳ {{ $product->regular_price }}</del>
                    </p>
                @else
                    <p class="ps-product__price sale">
                        ৳{{ $product->regular_price }}
                    </p>
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

             

                @if ($product->is_varient == 1)
                    <!-- start varient product add to cart direct -->
                    <input type="hidden" id="pfrom" value="direct">
                    <input type="hidden" id="product_product_id" value="{{ $product->id }}" min="1">
                    <input type="hidden" id="{{ $product->id }}-product_pname" value="{{ $product->name_en }}">
                    <input type="hidden" id="buyNowCheckHome" value="0">
                    <input type="hidden" id="{{ $product->id }}-product_color"
                        value="{{ $product->product_color }}">
                    <input type="hidden" id="{{ $product->id }}-product_size" value="{{ $product->product_size }}">
                    <!-- end varient product add to cart direct -->
                    <div class="d-flex cart_sec hover_display_none">
                        <a href="#" id="{{ $product->id }}" onclick="productView(this.id)" data-toggle="modal"
                            data-target="#product-quickview" class="btn btn-success btn-sm mt-3 btn-block read">
                            @if (session()->get('language') == 'bangla')
                                কার্টে যোগ করুন
                            @else
                                Add To Cart
                            @endif
                        </a>
                        <a onclick="buyNowHome({{ $product->id }})"
                            class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light read">
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
                    <input type="hidden" id="product_product_id" value="{{ $product->id }}" min="1">
                    <input type="hidden" id="{{ $product->id }}-product_pname" value="{{ $product->name_en }}">
                    <input type="hidden" id="{{ $product->id }}-product_color"
                        value="{{ $product->product_color }}">
                    <input type="hidden" id="{{ $product->id }}-product_size"
                        value="{{ $product->product_size }}">
                    <div class="d-flex cart_sec">
                        <a href="#" id="{{ $product->id }}" onclick="productView(this.id)"
                            data-toggle="modal" data-target="#product-quickview"
                            class="btn btn-success btn-sm mt-3 btn-block read">
                            @if (session()->get('language') == 'bangla')
                                কার্টে যোগ করুন
                            @else
                                Add To Cart
                            @endif
                        </a>
                        <a onclick="buyNowHome({{ $product->id }})"
                            class="btn btn-danger btn-sm mt-3 btn-block ml-2 read">
                            @if (session()->get('language') == 'bangla')
                                অর্ডার করুন
                            @else
                                Buy Now
                            @endif
                        </a>
                    </div>
                @endif

            </div>
            <div class="ps-product__content hover">
                <a class="ps-product__title" href="{{ route('product.details', $product->slug) }}">
                    @if (session()->get('language') == 'bangla')
                        <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                        {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                    @else
                        <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                        {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                    @endif
                </a>



                @if ($product->discount_price > 0)
                    <p class="ps-product__price sale">
                        ৳{{ $price_after_discount }}
                        <del>৳ {{ $product->regular_price }}</del>
                    </p>
                @else
                    <p class="ps-product__price sale">
                        ৳{{ $product->regular_price }}
                    </p>
                @endif

                <div class="ps-product__rating">
               
                </div>

                @if ($product->is_varient == 1)
                    <!-- start varient product add to cart direct -->
                    <input type="hidden" id="pfrom" value="direct">
                    <input type="hidden" id="product_product_id" value="{{ $product->id }}" min="1">
                    <input type="hidden" id="{{ $product->id }}-product_pname" value="{{ $product->name_en }}">
                    <input type="hidden" id="{{ $product->id }}-product_color"
                        value="{{ $product->product_color }}">
                    <input type="hidden" id="{{ $product->id }}-product_size"
                        value="{{ $product->product_size }}">
                    <!-- end varient product add to cart direct -->
                    <div class="d-flex">
                        <a href="#" id="{{ $product->id }}" onclick="productView(this.id)"
                            data-toggle="modal" data-target="#product-quickview"
                            class="btn btn-success btn-sm mt-3 btn-block read">
                            @if (session()->get('language') == 'bangla')
                                কার্টে যোগ করুন
                            @else
                                Add To Cart
                            @endif
                        </a>
                        <a onclick="buyNowHome({{ $product->id }})"
                            class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light read">
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
                    <input type="hidden" id="product_product_id" value="{{ $product->id }}" min="1">
                    <input type="hidden" id="{{ $product->id }}-product_pname" value="{{ $product->name_en }}">
                    <input type="hidden" id="{{ $product->id }}-product_color"
                        value="{{ $product->product_color }}">
                    <input type="hidden" id="{{ $product->id }}-product_size"
                        value="{{ $product->product_size }}">
                    <div class="d-flex cart_sec">
                        <a href="#" id="{{ $product->id }}" onclick="productView(this.id)"
                            data-toggle="modal" data-target="#product-quickview"
                            class="btn btn-success btn-sm mt-3 btn-block read">
                            @if (session()->get('language') == 'bangla')
                                কার্টে যোগ করুন
                            @else
                                Add To Cart
                            @endif
                        </a>
                        <a onclick="buyNowHome({{ $product->id }})"
                            class="btn btn-danger btn-sm mt-3 btn-block ml-2 text-light read">
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
@endforeach

<script>
    @foreach($hot_deals_product as $product)
    var hotDealEndDate_{{ $product->id }} = {{ $product->hot_deal_end_date ?: 0 }} * 1000; // সেকেন্ড থেকে মিলিসেকেন্ডে রূপান্তর
    var countdownInterval_{{ $product->id }} = setInterval(updateCountdown_{{ $product->id }}, 1000); // প্রতি সেকেন্ডে আপডেট হবে

    function updateCountdown_{{ $product->id }}() {
        var now = new Date().getTime(); // বর্তমান সময়
        var difference = hotDealEndDate_{{ $product->id }} - now; // প্রোডাক্টের শেষ সময়ের সাথে তুলনা

        // যদি সময় শেষ হয়ে যায়
        if (difference <= 0) {
            clearInterval(countdownInterval_{{ $product->id }}); // Countdown বন্ধ করা
            document.getElementById("countdown_{{ $product->id }}").innerHTML = '<div class="countdown-bar"><div class="countdown-label">সময় শেষ!</div></div>';
            return;
        }

        // দিন, ঘন্টা, মিনিট এবং সেকেন্ড গণনা করা
        var days = Math.floor(difference / (1000 * 60 * 60 * 24));
        var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((difference % (1000 * 60)) / 1000);

        // Countdown এর মান আপডেট করা
        document.getElementById("days_{{ $product->id }}").innerText = days;
        document.getElementById("hours_{{ $product->id }}").innerText = hours;
        document.getElementById("minutes_{{ $product->id }}").innerText = minutes;
        document.getElementById("seconds_{{ $product->id }}").innerText = seconds;
    }
    @endforeach
</script>

