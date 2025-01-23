@section('title', 'Products')


@extends('layouts.app')

@section('customCss')

    <style>
        /* categories üçün sticky stilini əlavə et */
        .widget.ltn__menu-widget {
            position: sticky;
            top: 70px;
            z-index: 10;
            background-color: white;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
        }

    </style>
@endsection
@section('content')

<body>

    <div class="body-wrapper">

        <div class="ltn__product-area ltn__product-gutter pt-65 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h2 class="section-title section-title-border">{{ $category->name }} Məhsulları</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-3">
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">categories</h4>
                            <ul>
                                @foreach($categories as $select)
                                    <li><a href="{{ route('admin.category.show', ['id' => $select->id]) }}">{{$select->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row justify-content-center">
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                    <div class="ltn__product-item text-center">
                                        <div class="product-img">
                                            <a href="{{ route('app.product_details', ['slug' => $product->slug]) }}">
                                                <img src="{{ Storage::url($product->product_image) }}" alt="#">
                                            </a>
                                            <div class="product-badge">
                                                <ul>
                                                    <li class="badge-1">Sale</li>
                                                </ul>
                                            </div>
                                            <div class="product-hover-action product-hover-action-2">
                                                <ul>
                                                    <li class="add-to-cart">
                                                        <a href="#" data-product-id="{{ $product->id }}" title="Add to Cart">
                                                            <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                            <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
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
            </div>
        </div>
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
</body>
@endsection
