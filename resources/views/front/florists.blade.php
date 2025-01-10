

@section('title', 'Florists')


@extends('layouts.app')


@section('content')


    <div class="ltn__product-area mb-100">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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
                                    @if($florists->count() > 0)
                                        @foreach($florists as $florist)
                                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                <div class="ltn__product-item text-center">
                                                    <div class="product-img">
                                                        <a href="product-details.html"><img src="{{ Storage::url($florist->florist_avatar) }}" class="florist-img" alt="Florist image"></a>
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="badge-1">Florist</li>
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
                                                                    <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                                        <span class="cart-text d-none d-xl-block">Tuana Florist</span>
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
                                                        <h2 class="product-title"><a href="product-details.html">{{ $florist->name }}</a></h2>
                                                        <div class="product-price">
                                                            <span>{{ $florist->phone }}</span>
                                                            <br>
                                                            <span class="mini-cart-quantity">{{ $florist->email }}</span>
                                                            <p>{{ $florist->address }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No florist found.</p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



