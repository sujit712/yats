@extends('layouts.front')

@section('content')


<!-- SLIDESHOW -->
<!-- <div class="slideshow swiper-container" data-autoplay="true" data-interval="3000">
    <div class="swiper-wrapper">
        <div class="swiper-slide" data-background="img/home-slider/yatin-dandekar-home-1.jpg" data-link="#"></div>
        <div class="swiper-slide" data-background="img/home-slider/yatin-dandekar-home-2.jpg" data-link="#"></div>
        <div class="swiper-slide" data-background="img/home-slider/yatin-dandekar-home-3.jpg" data-link="#"></div>
        <div class="swiper-slide" data-background="img/home-slider/yatin-dandekar-home-4.jpg" data-link="#"></div>
        <div class="swiper-slide" data-background="img/home-slider/yatin-dandekar-home-5.jpg" data-link="#"></div>
    </div>
</div> -->
<!-- /SLIDESHOW -->
    @if(isset($data))
    <div class="slideshow swiper-container" data-autoplay="true" data-interval="3000">
        <div class="swiper-wrapper">
            @foreach($data as $val)
                @if($val->status == 1)
                    <div class="swiper-slide" data-background="{{$val->image}}" data-link="#"></div> 
                @endif
            @endforeach
        </div>
    </div>
    @endif


@endsection

@section('footer')

<!-- FOOTER -->
<footer id="footer" class="fixed">
    
    <!-- FOOTER LINKS -->
    <div class="footer-links pull-left">
        &copy; 2017. All Rights Reserved |
        <a href="https://www.facebook.com/yatindandekarphotography/" target="_blank">Facebook</a> |
        <a href="https://www.instagram.com/yatindandekarphotography/" target="_blank">Instagram</a>
    </div>

    <!-- SLIDE CAPTION -->
    <div class="active-slide-caption"></div>
    
    <!-- CONTROLS -->
    <div class="controls-wrapper">

        <button class="sideslide swiper-prev">
            <i class="fa fa-chevron-left"></i>
        </button>
        <button class="sideslide swiper-play">
            <i class="fa fa-play"></i>
        </button>
        <button class="sideslide swiper-pause">
            <i class="fa fa-pause"></i>
        </button>
        <button class="sideslide swiper-next">
            <i class="fa fa-chevron-right"></i>
        </button>
        <button class="sideslide expand">
            <i class="fa fa-expand"></i>
        </button>

    </div>
    <!-- C/ONTROLS -->

</footer>
<!-- /FOOTER -->

@endsection