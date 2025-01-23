@section('title', 'Shop')


@extends('layouts.app')


@section('content')

<div class="ltn__shop-details-area pb-70 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="ltn__shop-details-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ltn__shop-details-img-gallery ltn__shop-details-img-gallery-2">
                                <div class="ltn__shop-details-large-img">


                                    <div class="single-large-img">
                                        <a href="{{Storage::url($shop->logo)}}" data-rel="lightcase:myCollection">
                                            <img src="{{Storage::url($shop->logo)}}" alt="{{$shop->name}}" style="width: 350px; height: 350px">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="modal-product-info shop-details-info pl-0">
                                <h5 class="product-price">{{$shop->name}}</h5>
                                <div class="product-price-ratting mb-20">
                                    <ul>
                                        <li>
                                            <div class="modal-product-brief">
                                                <p>{{$shop->description}}</p>
                                            </div>
                                            <p>Created by: <strong style="color: #0a53be">{{$shop->user->first_name}} {{$shop->user->last_name}}</strong></p>
                                            <div>
                                                <span>Phone: {{$shop->phone}}</span>
                                            </div>
                                            <span>Email: {{$shop->email}}</span>
                                            <br>
                                            <span>Address: {{$shop->address}}</span>
                                        </li>
                                    </ul>
                                </div>



                                <div class="ltn__social-media mb-30">
                                    <ul>
                                        <li class="d-meta-title">Share:</li>
                                        <li><a href="{{$settings->facebook}}" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="{{$settings->twitter}}" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                                        <li><a href="{{$settings->linkedin}}" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                                        <li><a href="{{$settings->instagram}}" title="Instagram"><i class="icon-social-instagram"></i></a></li>

                                    </ul>
                                </div>
                                @if(auth()->check() && auth()->id() === $shop->user_id)

                                    <div class="shop-actions">
                                        <a href="{{ route('app.products.create') }}" class="btn btn-sm btn-primary">Add Product</a>
                                        <a href="{{ route('app.shops.edit', ['id' => $shop->id]) }}" class="btn btn-sm btn-primary mx-2">Edit</a>
                                        <a href="{{ route('app.shops.destroy', ['id' => $shop->id]) }}"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Are you sure you want to delete this shop?')">Delete Shop</a>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
                            <a href="{{ route('app.product_details', ['slug' => $shop->slug]) }}"><img src="{{Storage::url($product->product_image)}}" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="badge-1">{{$shop->name}}</li>
                                </ul>
                            </div>
                            <div class="product-hover-action product-hover-action-2">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </li>
                                    <li class="add-to-cart">
                                        <a href="{{route('app.cart.index')}}" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
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

@endsection
