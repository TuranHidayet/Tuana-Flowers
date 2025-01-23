



<div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">

        <div class="ltn__utilize-menu-head">
            <span class="ltn__utilize-menu-title">Cart</span>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="mini-cart-product-area ltn__scrollbar" id="mini-cart-products">

                    <div class="mini-cart-item clearfix" >
                        <div class="mini-cart-img">
                            <a href="#"><img src="" alt=""></a>
                            <span class="mini-cart-item-delete"><i class="icon-trash"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">product name</a></h6>
                            <span class="mini-cart-quantity">quantity x price</span>
                        </div>
                    </div>
        </div>
        <div class="mini-cart-footer">
            <div class="mini-cart-sub-total">
                <h5>Subtotal: <span id="mini-cart-subtotal">
{{--                    ${{ session('cart') ? array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart'))) : '0.00' }}--}}
                </span></h5>
            </div>
            <div class="btn-wrapper">
                <a href="{{route('app.cart.index')}}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                <a href="checkout.index" class="theme-btn-2 btn btn-effect-2">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- Utilize Cart Menu End -->


@section('customJs')
    <script>

    </script>


@endsection
