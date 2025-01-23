@section('title', 'Home')


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

    @include('front.partials.sliders')

    @include('front.partials.feature')

    @include('front.partials.banner')



    <div class="ltn__product-area ltn__product-gutter pt-65 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title section-title-border">Yeni Məhsullar</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-3">
                    <div class="widget ltn__menu-widget">
                        <h4 class="ltn__widget-title">categories</h4>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="{{ route('admin.category.show', ['id' => $category->id]) }}">{{$category->name}}</a></li>
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
                                                    <a href="#"
                                                       data-product-id="{{ $product->id }}"
                                                       data-product-name="{{ $product->name }}"
                                                       data-product-image="{{ Storage::url($product->product_image) }}"
                                                       data-product-price="{{ $product->price }}"
                                                       data-product = "{{ $product }}"
                                                       title="Add to Cart">
                                                        <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                        <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title">
                                            <a href="{{ route('app.product_details', ['slug' => $product->slug]) }}">{{$product->name}}</a>
                                        </h2>
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




    @include('front.partials.bannerBottom')


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

@section('customJs')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Səbət UI-ni səhifə yükləndikdən sonra göstər
            showCartUI();

            document.querySelectorAll('.add-to-cart a').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();

                    const productId = this.getAttribute('data-product-id');
                    const productName = this.getAttribute('data-product-name');
                    const productImage = this.getAttribute('data-product-image');
                    const productPrice = this.getAttribute('data-product-price');
                    const product = JSON.parse(this.getAttribute('data-product'));

                    // Modal sahəsini doldur
                    document.querySelector('#add_to_cart_modal .modal-product-img img').src = productImage;
                    document.querySelector('#add_to_cart_modal .modal-product-info h5 a').textContent = productName;
                    document.querySelector('#add_to_cart_modal .modal-product-info h5 a').href = `/product/${productId}`;
                    document.querySelector('#add_to_cart_modal .modal-product-info .added-cart').textContent = `Successfully added ${productName} to your Cart`;

                    // Modalı aç
                    const modal = new bootstrap.Modal(document.getElementById('add_to_cart_modal'));
                    modal.show();

                    // Məhsulu səbətə əlavə edin və UI-ni yeniləyin
                    addToStorage(product);
                    showCartUI();
                });
            });
        });



        function addToStorage(product){

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item => item.id === product.id);

            if (existingProduct) {
                existingProduct.quantity++;
            } else {
                product.quantity = 1;
                cart.push(product);
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Məhsul səbətə əlavə edildi!');
        }

        function showCartUI() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartContainer = document.querySelector('#mini-cart-products');

            // Səbət siyahısını təmizləyirik
            cartContainer.innerHTML = '';

            if (cart.length === 0) {
                cartContainer.innerHTML = '<p>Səbət boşdur!</p>';
                return;
            }

            const storageUrl = '{{Storage::url('')}}';
            // Səbətdəki hər bir məhsulu göstəririk
            cart.forEach(product => {

                const productImage = product.product_image
                    ? `${storageUrl}${product.product_image}`
                    : '/default-image.jpg';

                const productHTML = `
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="${productImage}" alt="${product.name}"></a>
                    <span class="mini-cart-item-delete" onclick="removeFromCart(${product.id})"><i class="icon-trash"></i></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">${product.name}</a></h6>
                    <span class="mini-cart-quantity">${product.quantity * product.price} AZN</span>
                </div>
            </div>
        `;
                cartContainer.insertAdjacentHTML('beforeend', productHTML);
            });
        }

    </script>

@endsection

