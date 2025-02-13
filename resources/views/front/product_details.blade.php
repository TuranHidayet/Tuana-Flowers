@section('title', 'Product')


@extends('layouts.app')


@section('content')

<style>
{{--product_details -> rating css --}}
    .text-warning {
        color: #ffc107;
    }

    .text-secondary {
        color: #ccc;
    }
</style>

<!-- SHOP DETAILS AREA START -->
<div class="ltn__shop-details-area pb-70">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="ltn__shop-details-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ltn__shop-details-img-gallery ltn__shop-details-img-gallery-2">

                                <div class="ltn__shop-details-small-img slick-arrow-2">
                                    @foreach($galleryImages as $gallery)
                                    <div class="single-small-img">
                                        <img src="{{ Storage::url($gallery->path) }}" alt="Image">
                                    </div>
                                    @endforeach
                                </div>

                                <div class="ltn__shop-details-large-img">


                                    <div class="single-large-img">
                                        <a href="{{Storage::url($product->product_image)}}" data-rel="lightcase:myCollection">
                                            <img src="{{Storage::url($product->product_image)}}" alt="Image" style="max-width: 300px; max-height: 350px">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="modal-product-info shop-details-info pl-0">
                                <h3>{{$product->name}}</h3>
                                <div class="product-price-ratting mb-20">
                                    <ul>
                                        <li>
                                            <div class="product-price">
                                                <span>{{$product->price}}</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="modal-product-brief">
                                    <p>{{$product->description}}</p>
                                </div>
                                <div class="modal-product-meta ltn__product-details-menu-1 mb-20">

                                        <div class="product-ratting">
                                            <ul>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= round($averageRating))
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    @else
                                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    @endif
                                                @endfor
                                                <div class="review-total">
                                                    <a href="#">({{ $product->comments->count() }} Reviews)</a>
                                                </div>
                                            </ul>
                                        </div>

                                </div>
                                <div class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                    <ul>
                                        <li>
                                            <div class="cart-plus-minus">
                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="theme-btn-1 btn btn-success d-add-to-cart" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                <span>ADD TO CART</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-effect-1 d-add-to-wishlist" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
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
                                <div class="modal-product-meta ltn__product-details-menu-1 mb-30">
                                    <ul>

                                        <li>
                                            <strong>Categories:</strong>
                                            @foreach($product->categories as $category)
                                                <span>
                                                    <a href="#">{{$category->name}}</a>
                                                </span>
                                            @endforeach
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
<!-- SHOP DETAILS AREA END -->

<!-- SHOP DETAILS TAB AREA START -->
<div class="ltn__shop-details-tab-area pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__shop-details-tab-inner">
                    <div class="ltn__shop-details-tab-menu">
                        <div class="nav">
                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                            <a data-bs-toggle="tab" href="#liton_tab_details_1_2" class="">Reviews</a>
                            <!-- <a data-bs-toggle="tab" href="#liton_tab_details_1_3" class="">Comments</a> -->
                            <a data-bs-toggle="tab" href="#liton_tab_details_1_4" class="">Shipping</a>
                            <!-- <a data-bs-toggle="tab" href="#liton_tab_details_1_5" class="">Size Chart</a> -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                            <div class="ltn__shop-details-tab-content-inner text-center">
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_details_1_2">
                            <div class="ltn__shop-details-tab-content-inner">
                                <div class="customer-reviews-head text-center">
                                    <h4 class="title-2">Customer Reviews</h4>
                                    <div class="product-ratting">
                                        <ul>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= round($averageRating))
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                @else
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                @endif
                                            @endfor
                                                <div class="review-total">
                                                    <a href="#">({{ $product->comments->count() }} Reviews)</a>
                                                </div>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <!-- comment-area -->
                                        <div class="ltn__comment-area mb-30">
                                            <div class="ltn__comment-inner">
                                                <ul>
                                                    @if($product->comments && $product->comments->count() > 0)
                                                    @foreach ($product->comments as $comment)
                                                        <li>
                                                            <div class="ltn__comment-item clearfix">
                                                                <div class="ltn__commenter-img">
                                                                    <img src="{{Storage::url($comment->user->avatar)  ?? asset('default-avatar.png') }}" style="width: 70px; height: 70px;" class="rounded-circle"  alt="Image">
                                                                </div>
                                                                <div class="ltn__commenter-comment">
                                                                    <h6><a href="#">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</a></h6>

                                                                    <div class="product-ratting">
                                                                        <ul>
                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                @if ($i <= $comment->rating)
                                                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                                @else
                                                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                                @endif
                                                                            @endfor
                                                                        </ul>
                                                                    </div>

                                                                    <p>{{ $comment->comment }}</p>
                                                                    <span class="ltn__comment-reply-btn">{{ $comment->created_at->format('F j, Y') }}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                    @else
                                                        <p>No reviews available for this product.</p>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <!-- comment-reply -->
                                        @auth
                                        <div class="ltn__comment-reply-area ltn__form-box mb-60">
                                            <form action="{{ route('app.comments.store', ['id' => $product->id]) }}" method="POST">
                                                @csrf
                                                <h4 class="title-2">Add a Review</h4>
                                                <div class="mb-30">
                                                    <div class="add-a-review">
                                                        <h6>Your Ratings:</h6>
                                                        <div class="product-ratting">
                                                            <ul id="rating-stars">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <li>
                                                                        <label>
                                                                            <input type="radio" name="rating" value="{{ $i }}" style="display: none;" required>
                                                                            <i class="fas fa-star"></i>
                                                                        </label>
                                                                    </li>
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                    <textarea name="comment" placeholder="Type your comments...."></textarea>
                                                </div>

                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                <div class="btn-wrapper">
                                                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                            <div class="alert alert-warning">
                                                Please <a href="{{ route('app.login') }}">log in</a> to add a review.
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_details_1_3">
                            <div class="ltn__shop-details-tab-content-inner">
                                <!-- comment-area -->
                                <div class="ltn__comment-area mb-30">
                                    <h4 class="title-2">Comments (5)</h4>
                                    <div class="ltn__comment-inner">
                                        <ul>
                                            <li>
                                                <div class="ltn__comment-item clearfix">
                                                    <div class="ltn__commenter-img">
                                                        <img src="img/testimonial/1.jpg" alt="Image">
                                                    </div>
                                                    <div class="ltn__commenter-comment">
                                                        <h6><a href="#">Adam Smit</a></h6>
                                                        <span class="comment-date">20th May 2020</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                        <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ltn__comment-item clearfix">
                                                    <div class="ltn__commenter-img">
                                                        <img src="img/testimonial/3.jpg" alt="Image">
                                                    </div>
                                                    <div class="ltn__commenter-comment">
                                                        <h6><a href="#">Adam Smit</a></h6>
                                                        <span class="comment-date">20th May 2020</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                        <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="ltn__comment-item clearfix">
                                                            <div class="ltn__commenter-img">
                                                                <img src="img/testimonial/4.jpg" alt="Image">
                                                            </div>
                                                            <div class="ltn__commenter-comment">
                                                                <h6><a href="#">Adam Smit</a></h6>
                                                                <span class="comment-date">20th May 2020</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                                <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="ltn__comment-item clearfix">
                                                            <div class="ltn__commenter-img">
                                                                <img src="img/testimonial/1.jpg" alt="Image">
                                                            </div>
                                                            <div class="ltn__commenter-comment">
                                                                <h6><a href="#">Adam Smit</a></h6>
                                                                <span class="comment-date">20th May 2020</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                                <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="ltn__comment-item clearfix">
                                                    <div class="ltn__commenter-img">
                                                        <img src="img/testimonial/2.jpg" alt="Image">
                                                    </div>
                                                    <div class="ltn__commenter-comment">
                                                        <h6><a href="#">Adam Smit</a></h6>
                                                        <span class="comment-date">20th May 2020</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                        <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- comment-reply -->
                                <div class="ltn__comment-reply-area ltn__form-box mb-60">
                                    <form action="#">
                                        <h4 class="title-2">Leave a Reply</h4>
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea placeholder="Type your comments...."></textarea>
                                        </div>
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" placeholder="Type your name....">
                                        </div>
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" placeholder="Type your email....">
                                        </div>
                                        <div class="input-item input-item-website ltn__custom-icon">
                                            <input type="text" name="website" placeholder="Type your website....">
                                        </div>
                                        <label class="mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label>
                                        <div class="btn-wrapper">
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit"><i class="far fa-comments"></i> Post Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_details_1_4">
                            <div class="ltn__shop-details-tab-content-inner">
                                <h4 class="title-2">Shipping policy for our store</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam voluptates rerum neque ea libero numquam officiis ipsum, consectetur ducimus dicta in earum repellat sunt ab odit laboriosam cupiditate ipsam, doloremque.</p>
                                <ul>
                                    <li>1-2 business days (Typically by end of day)</li>
                                    <li><a href="#">30 days money back guaranty</a></li>
                                    <li>24/7 live support</li>
                                    <li>odio dignissim qui blandit praesent</li>
                                    <li>luptatum zzril delenit augue duis dolore</li>
                                    <li>te feugait nulla facilisi.</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, quia vel eligendi ipsam. Ea, quasi quam ducimus recusandae unde ipsa nam rem a minus tenetur quae sint voluptatem voluptate inventore.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_details_1_5">
                            <div class="ltn__shop-details-tab-content-inner">



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS TAB AREA END -->

<!-- PRODUCT SLIDER AREA START -->
<div class="ltn__product-slider-area pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title section-title-border">related products</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__related-product-slider-one-active slick-arrow-1">
            <!-- ltn__product-item -->
            <div class="col-12">
                <div class="ltn__product-item ltn__product-item-4">
                    <div class="product-img">
                        <a href="product-details.html"><img src="img/product/7.png" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="badge-2">10%</li>
                            </ul>
                        </div>
                        <div class="product-hover-action product-hover-action-3">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                        <i class="icon-handbag"></i>
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
                        <div class="product-ratting">
                            <ul>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                            </ul>
                        </div>
                        <h2 class="product-title"><a href="product-details.html">Pink Flower Tree</a></h2>
                        <div class="product-price">
                            <span>$18.00</span>
                            <del>$21.00</del>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- PRODUCT SLIDER AREA END -->
@endsection

@section('customJs')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const stars = document.querySelectorAll("#rating-stars li i");
            const inputs = document.querySelectorAll("#rating-stars li input");

            inputs.forEach((input, index) => {
                input.addEventListener("change", function () {
                    stars.forEach((star, idx) => {
                        if (idx <= index) {
                            star.classList.add("text-warning"); // Sarı rəng
                            star.classList.remove("text-secondary"); // Boz rəng
                        } else {
                            star.classList.remove("text-warning");
                            star.classList.add("text-secondary");
                        }
                    });
                });
            });
        });
    </script>

@endsection
