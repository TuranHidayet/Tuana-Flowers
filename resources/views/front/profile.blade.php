@section('title', 'Profile')

@extends('layouts.app')

@section('content')

    {{--    <!-- Admin LTE 3 -->--}}
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!--Admin  Select2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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

            @if($userShops && $userShops->count() > 0)
                <h5>Our Flower Products</h5>
                <p>View Tuana flower products.</p>
                <a href="{{ route('app.products.index') }}" class="btn btn-primary" id="products-button">Go to Products</a>
            @else
                <h5>Your haven't got a Shop</h5>
                <a href="{{ route('app.shops.create') }}" class="btn btn-primary" id="create-shop-button">Create a Shop</a>
            @endif
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
                             <a  href="{{route('app.shops.show', ['slug' => $shop->slug] )}}"><h4 class="shop-title"><span style="color: red ">{{ $shop->name }}</span></h4></a>
                             <div class="profile-header">
                                 <a  href="{{route('app.shops.show', ['slug' => $shop->slug] )}}"> <img   src="{{ $shop->logo ? Storage::url($shop->logo) : asset('default-logo.png') }}" alt="Shop Logo" class="shop-logo"></a>
                             </div>

                             <p class="shop-description">{{ $shop->description }}</p>
                             <div class="shop-details">
                                 <p><strong>Address:</strong> {{ $shop->address }}</p>
                                 <p><strong>Phone:</strong> {{ $shop->phone }}</p>
                                 <p><strong>Email:</strong> {{ $shop->email }}</p>
                             </div>
                             <div class="">
                                 <a href="{{ route('app.products.create') }}" class="btn btn-sm btn-custom">Add Product</a>
                                 <a href="{{ route('app.shops.edit', ['id'=>$shop->id]) }}" class="btn btn-sm btn-primary mx-2">Edit</a>
                             </div>
                         </div>
             </div>
             @else
                 <div class="create-shop-container mb-3">
                     <div class="user-shops mt-4 text-center">
                         <p>You have not created any shops yet.</p>
                         <a href="{{ route('app.shops.create') }}" class="btn btn-primary">Create a Shop</a>
                     </div>
                 </div>
             @endif
         </div>
    @endforeach
    </div>
</div>

@endsection
