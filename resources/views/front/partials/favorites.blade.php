@section('title', 'Cart')

@extends('layouts.app')

@section('content')

    <div class="ltn__utilize-overlay"></div>

    <!-- SHOPING CART AREA START -->
    <div class="liton__shoping-cart-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                                <tbody>
                                @foreach($cart as $item)
                                    @if (isset($item['id']))
                                        <tr>
                                            <td class="cart-product-remove">
                                                <button onclick="removeFromCart({{ $item['id'] }})">x</button>
                                            </td>
                                            <td class="cart-product-image">
                                                <a href="product-details.html">
                                                    <img src="{{ $item['product_image'] ? Storage::url($item['product_image']) : '/default-image.jpg' }}" alt="{{ $item['name'] }}">
                                                </a>
                                            </td>
                                            <td class="cart-product-info">
                                                <h4><a href="product-details.html">{{ $item['name'] }}</a></h4>
                                            </td>
                                            <td class="cart-product-price">{{ $item['price'] }} AZN</td>
                                            <td class="cart-product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="{{ $item['quantity'] }}" name="qtybutton" class="cart-plus-minus-box">
                                                </div>
                                            </td>
                                            <td class="cart-product-subtotal">{{ $item['price'] * $item['quantity'] }} AZN</td>
                                        </tr>
                                    @else
                                        <p>Məhsul məlumatları tamamlanmamışdır.</p>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="shoping-cart-total mt-50">
                            <h4>Cart Totals</h4>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Cart Subtotal</td>
                                    <td>$618.00</td>
                                </tr>
                                <tr>
                                    <td>Shipping and Handing</td>
                                    <td>$15.00</td>
                                </tr>
                                <tr>
                                    <td>Vat</td>
                                    <td>$00.00</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td><strong>$633.00</strong></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="btn-wrapper text-right">
                                <a href="checkout.html" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING CART AREA END -->

@endsection


