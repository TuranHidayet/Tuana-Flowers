@section('title', 'Profile')

@extends('layouts.app')

@section('content')

    <style>
        {{--        Profile CSS--}}
 body {
            background-color: #f8f9fa;
        }

        .profile-card {
            max-width: 600px;
            margin: 50px auto;
            background: #d595fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        .profile-header {
            text-align: center;
        }

        .goProduct{
            background: #fac895;
            border-radius: 7px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .btn-custom {
            background: #28a745;
            color: white;
            transition: 0.3s;
            border-radius: 7px;
        }

        .btn-primary {

            border-radius: 7px;
        }

        .btn-custom:hover {
            background: #218838;
        }
    </style>

<div class="container">
    @include('front.partials.breadcrumb', ['title' => 'Your Profile'])
    <div class="profile-card">
        <div class="profile-header">
            <img src="{{Storage::url($user->avatar)}}" alt="User Avatar">
            <h2 id="welcome-text">Welcome, <span style="color: #0a53be ">{{$user->first_name}} {{$user->last_name}}</span></h2>
        </div>
        <hr>
        <div class="profile-info">
            <p><strong>First Name:</strong> <span id="first-name" style="color: red ">{{$user->first_name}}</span></p>
            <p><strong>Last Name:</strong> <span id="last-name" style="color: red ">{{$user->last_name}}</span></p>
            <p><strong>Email:</strong> <span id="email" style="color: red ">{{$user->email}}</span></p>
            <p><strong>Phone:</strong> <span id="phone" style="color: red ">{{$user->phone}}</span></p>
        </div>
        <hr>
        <div class="text-center goProduct p-2">
            <h5>Our Flower Products</h5>
            <p>View Tuana flower products.</p>
            <a href="{{ route('app.products.index') }}" class="btn btn-primary" id="products-button">Go to Products</a>
        </div>
    </div>
</div>

<div class="container">
    <h3 class="text-center">Your Shops</h3>
    <div class="d-flex">
    @foreach($userShops as $shop)
         <div class="create-shop-container mb-3">
             @if($userShops && $userShops->count() > 0)
             <div class="user-shops mt-4">

                         <div class="shop-info mb-4">
                             <h4 class="shop-title"><span style="color: red ">{{ $shop->name }}</span></h4>
                             <div class="profile-header">
                                 <img src="{{ $shop->logo ? Storage::url($shop->logo) : asset('default-logo.png') }}" alt="Shop Logo" class="shop-logo">
                             </div>

                             <p class="shop-description">{{ $shop->description }}</p>
                             <div class="shop-details">
                                 <p><strong>Address:</strong> {{ $shop->address }}</p>
                                 <p><strong>Phone:</strong> {{ $shop->phone }}</p>
                                 <p><strong>Email:</strong> {{ $shop->email }}</p>
                             </div>

                             <a href="{{ route('app.products.create') }}" class="btn btn-custom">Add Product</a>
                         </div>
             </div>
             @else
                 <p>You have not created any shops yet.</p>
                 <a href="{{ route('app.shops.create') }}" class="btn btn-primary">Create a Shop</a>
             @endif
         </div>
    @endforeach
    </div>
</div>


     <div class="row justify-content-center mt-5">
                @foreach($userShop->products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="ltn__product-item text-center">
                            <div class="product-img">
                                <a href="{{ route('app.product_details', ['slug' => $product->slug]) }}">
                                    <img src="{{ Storage::url($product->product_image) }}" alt="{{ $product->name }}">
                                </a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="badge-1">{{ $userShop->name }}</li>
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
                                            <a href="{{ route('app.cart.index') }}" title="Add to Cart">
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
                                <h2 class="product-title">
                                    <a href="{{ route('app.product_details', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                </h2>
                                <div class="product-price">
                                    <span>$ {{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>




@endsection
