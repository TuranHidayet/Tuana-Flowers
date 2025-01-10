<div class="ltn__slider-area ltn__slider-3 ltn__slider-6 section-bg-1">
    <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1 arrow-white---">
        @foreach($sliders as $slider)
            <div class="ltn__slide-item ltn__slide-item-8 text-color-white---- bg-image bg-overlay-theme-black-80---" data-bs-bg="{{Storage::url($slider->image)}}">
                <div class="ltn__slide-item-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <div class="slide-item-info">
                                            <div class="slide-item-info-inner ltn__slide-animation">
                                                <h1 class="slide-title animated ">{{$slider->title}}</h1>
                                                <h6 class="slide-sub-title ltn__body-color slide-title-line animated">{{$slider->short_desc}}</h6>
                                                <div class="slide-brief animated">
                                                    <p>{{$slider->description}}</p>
                                                </div>
                                                <div class="btn-wrapper animated">
                                                    <a href="service.html" class="theme-btn-1 btn btn-round">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--                                 <div class="slide-item-img">--}}
                                {{--                                    <img src="{{asset('front/img/slider/41-1.png')}}" alt="#">--}}
                                {{--                                    <span class="call-to-circle-1"></span>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
