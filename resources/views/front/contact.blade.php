@section('title', 'Contact')

@extends('layouts.app')

@section('content')

<body>

<div class="body-wrapper">

    @include('front.partials.breadcrumb', ['title' => 'Contact'])




    <div class="ltn__utilize-overlay"></div>


    <div class="ltn__contact-address-area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="icon-location-pin"></i>
                        </div>
                        <h3>Address</h3>
                        <p>{{$settings->address}}</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="icon-phone"></i>
                        </div>
                        <h3>Phone Number</h3>
                        <p>{{$settings->phone}}</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="icon-envelope"></i>
                        </div>
                        <h3>Email & Web</h3>
                        <p>{{$settings->email}} <br>
                            turanhidayatov.com</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="icon-speedometer"></i>
                        </div>
                        <h3>Opening Hours</h3>
                        <p>Fri to Wed: 6:00 Am to 8:00 Pm <br>
                            Thursday - Off</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__contact-message-area mt-100 mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow--- white-bg---">
                        <h3 class="text-center mb-50">Need Our Help! Please Send an Email.</h3>
                        <form action="{{ route('app.contact.store') }}" id="shopForm" method="POST" class="ltn__form-box contact-form-box" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="name" placeholder="Name:">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <input type="email" name="email" placeholder="Email:">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror


                                    <input type="text" name="phone" placeholder="Phone Number:">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <input type="text" name="subject" placeholder="Subject:">
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-7">
                                    <textarea name="message" placeholder="Enter message"></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <div class="btn-wrapper mt-0">
                                        <button class="btn theme-btn-1 btn-outline-success text-uppercase" type="submit">Send Message</button>
                                    </div>
                                    <p class="form-messege mb-0 mt-20"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ltn_google-map-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="google-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7%3A0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- GOOGLE MAP AREA END -->

</div>
</body>
@endsection


@section('customJs')

    <script>
        document.querySelector('#shopForm').addEventListener('submit', function (e) {
            e.preventDefault();
            showAlert(
                "Success!",
                "Thanks for contacting us!",
                "success",
                "Close"
            );

            this.submit();
        });

    </script>

@endsection
