@section('title', 'Home')


@extends('layouts.app')


@section('content')



<body>

<div class="body-wrapper">

    @include('front.partials.sliders')

    @include('front.partials.banner')

    @include('front.partials.feature')

    <div class="ltn__product-area ltn__product-gutter  pt-65 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title section-title-border">new arrival items</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item text-center">
                        <div class="product-img">
                            <a href="{{ route('app.product_details', ['slug' => $product->slug]) }}"><img src="{{Storage::url($product->product_image)}}" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="badge-1">Hot</li>
                                </ul>
                            </div>
                            <div class="product-hover-action product-hover-action-2">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </li>
{{--                                    <li class="add-to-cart">--}}
{{--                                        <a href="{{route('app.cart.index')}}" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">--}}
{{--                                            <span class="cart-text d-none d-xl-block">Add to Cart</span>--}}
{{--                                            <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li class="add-to-cart">
                                        <a href="#" data-product-id="{{ $product->id }}" title="Add to Cart">
                                            <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                            <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="icon-shuffle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <h2 class="product-title"><a href="{{ route('app.product_details', ['slug' => $product->slug]) }}">{{$product->name}}</a></h2>
                            <div class="product-price">
                                <span>$ {{$product->price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="widget ltn__menu-widget">
        <h4 class="ltn__widget-title">categories</h4>
        <ul>
            @foreach($categories as $category)
                <li><a href="#">{{$category->name}}</a></li>
            @endforeach

        </ul>
    </div>



    @include('front.partials.bannerBottom')


    <!-- MODAL AREA START (Quick View Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/4.png" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info shop-details-info pl-0">
                                            <h3>Pink Flower Tree Red</h3>
                                            <div class="product-price-ratting mb-20">
                                                <ul>
                                                    <li>
                                                        <div class="product-price">
                                                            <span>$49.00</span>
                                                            <del>$65.00</del>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="product-ratting">
                                                            <ul>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-product-brief">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos repellendus repudiandae incidunt quidem pariatur expedita, quo quis modi tempore non.</p>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1 mb-20">
                                                <ul>
                                                    <li>
                                                        <div class="ltn__color-widget clearfix">
                                                            <strong class="d-meta-title">Color</strong>
                                                            <ul>
                                                                <li class="theme"><a href="#"></a></li>
                                                                <li class="green-2"><a href="#"></a></li>
                                                                <li class="blue-2"><a href="#"></a></li>
                                                                <li class="white"><a href="#"></a></li>
                                                                <li class="red"><a href="#"></a></li>
                                                                <li class="yellow"><a href="#"></a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="ltn__size-widget clearfix mt-25">
                                                            <strong class="d-meta-title">Size</strong>
                                                            <ul>
                                                                <li><a href="#">S</a></li>
                                                                <li><a href="#">M</a></li>
                                                                <li><a href="#">L</a></li>
                                                                <li><a href="#">XL</a></li>
                                                                <li><a href="#">XXL</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('app.cart.index')}}" class="theme-btn-1 btn btn-effect-1 d-add-to-cart" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                            <span>ADD TO CART</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="btn btn-effect-1 d-add-to-wishlist" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                            <i class="icon-heart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__social-media mb-30">
                                                <ul>
                                                    <li class="d-meta-title">Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                                                    <li><a href="#" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="icon-social-instagram"></i></a></li>

                                                </ul>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1 mb-30 d-none">
                                                <ul>
                                                    <li><strong>SKU:</strong> <span>12345</span></li>
                                                    <li>
                                                        <strong>Categories:</strong>
                                                        <span>
                                                            <a href="#">Flower</a>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <strong>Tags:</strong>
                                                        <span>
                                                            <a href="#">Love</a>
                                                            <a href="#">Flower</a>
                                                            <a href="#">Heart</a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__safe-checkout d-none">
                                                <h5>Guaranteed Safe Checkout</h5>
                                                <img src="img/icons/payment-2.png" alt="Payment Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Add To Cart Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-add-to-cart-content clearfix">
                                            <div class="modal-product-img">
                                                <img src="{{Storage::url($product->product_image)}}" alt="#">
                                            </div>
                                            <div class="modal-product-info">
                                                <h5><a href="{{ route('app.product_details', ['slug' => $product->slug]) }}">{{$product->name}}</a></h5>
                                                <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Cart</p>
                                                <div class="btn-wrapper">
                                                    <a href="{{route('app.cart.index')}}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                    <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- additional-info -->
                                        <div class="additional-info d-none--">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use (fiama10) discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="{{asset('front/img/icons/payment.png')}}" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/7.png" alt="#">
                                        </div>
                                        <div class="modal-product-info">
                                            <h5><a href="{{ route('app.product_details', ['slug' => $product->slug]) }}">{{$product->name}}">Brake Conversion Kit</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Wishlist</p>
                                            <div class="btn-wrapper">
                                                <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View Wishlist</a>
                                            </div>
                                        </div>
                                        <!-- additional-info -->
                                        <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

</div>
<!-- Body main wrapper end -->

<!-- preloader area start -->
<div class="preloader d-none" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->




</body>


@endsection
