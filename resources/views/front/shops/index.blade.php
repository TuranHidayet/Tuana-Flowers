@section('title', 'Shops')

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

<div class="body-wrapper">
    <div class="ltn__utilize-overlay"></div>
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-100">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="showing-product-number text-right">
                                    <span>Showing 9 of 20 results</span>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="icon-grid"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="icon-menu"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    @foreach($shops as $shop)
                                        <div class="col-xl-4 col-sm-6 col-12">
                                            <div class="ltn__product-item text-center">
                                                <div class="product-img">
                                                    <a href="{{ route('app.shops.show', ['slug' => $shop->slug]) }}">
                                                        <img src="{{ Storage::url($shop->logo) }}" alt="{{ $shop->name }}" class="img-fluid" style="max-width: 250px; height: 190px; object-fit: cover;">
                                                    </a>
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="badge-1">{{ $shop->name }}</li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="product-info">
                                                    <h4 class="product-title"><a href="{{route('app.shops.show', ['slug' => $shop->slug] )}}">{{$shop->name}}</a></h4>
                                                    <div class="product-price">
                                                        <span>{{$shop->address}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination ltn__pagination-2">
                            <ul>
                                <li><a href="#"><i class="icon-arrow-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  mb-100">
                    <aside class="sidebar ltn__shop-sidebar">
                        <!-- Search Widget -->
                        <div class="widget ltn__search-widget">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search your keyword...">
                                <button type="submit"><i class="icon-magnifier"></i></button>
                            </form>
                        </div>

                        <!-- Category Widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">categories</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{ route('admin.category.show', ['id' => $category->id]) }}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>


                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

        <div class="create-shop-container">
            <h2 class="create-shop-title">Create Your New Shop</h2>
            <p class="create-shop-description">
                Create your own shop and start selling your products today!
            </p>
            @auth
                <a href="{{ route('app.shops.create') }}" class="btn btn-primary">Create Shop</a>
            @else
                <a href="{{ route('app.login') }}" class="btn btn-secondary">Login to Create Shop</a>
            @endauth
        </div>

</div>

<!-- preloader area start -->
<div class="preloader d-none" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
@endsection


