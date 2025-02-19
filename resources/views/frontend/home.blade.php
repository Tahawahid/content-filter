<x-layout>

    <x-preloader></x-preloader>

    <x-nav></x-nav>

    <main data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
        tabindex="0">
        <!-- Header Start -->
        <header id="home" class="hero-area hero-area-2 home-2 position-relative">
            <div class="hero-area-top-part position-relative">
                <img src="{{ asset('assets/img/home2-hero-floating-img.png') }}" alt="footer-bg"
                    class="hero-top-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">

                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="hero-content position-relative">

                                <div class="home-two-hero-animation position-relative m-auto">
                                    <div class="komi">
                                        <div class="komi-head">
                                            <div class="komi-hair-back">
                                                <div class="komi-hair-back-1"></div>
                                            </div>
                                            <div class="komi-ear komi-ear-left"></div>
                                            <div class="komi-ear komi-ear-right"></div>
                                            <div class="komi-cat-ear komi-cat-ear-left">
                                                <div class="komi-cat-ear-fur"></div>
                                            </div>
                                            <div class="komi-cat-ear komi-cat-ear-right">
                                                <div class="komi-cat-ear-fur"></div>
                                            </div>
                                            <div class="komi-hair-strand"></div>
                                            <div class="komi-face"></div>
                                            <div class="komi-hair-bangs">
                                                <div class="komi-hair-bangs-1"></div>
                                                <div class="komi-hair-bangs-2"></div>
                                                <div class="komi-hair-bangs-3"></div>
                                            </div>
                                            <div class="komi-face-inner">
                                                <div class="komi-eye komi-eye-left">
                                                    <div class="komi-eye-pupil">
                                                        <div class="komi-eye-sparkle"></div>
                                                    </div>
                                                </div>
                                                <div class="komi-eye komi-eye-right">
                                                    <div class="komi-eye-pupil">
                                                        <div class="komi-eye-sparkle"></div>
                                                    </div>
                                                </div>
                                                <div class="komi-blush komi-blush-left"></div>
                                                <div class="komi-blush komi-blush-right"></div>
                                            </div>
                                        </div>
                                        <div class="komi-panel">
                                            <div class="komi-hair-extension"></div>
                                            <div class="komi-body">
                                                <div class="komi-neck">
                                                    <div class="komi-neck-shadow"></div>
                                                    <div class="komi-collar komi-collar-left"></div>
                                                    <div class="komi-collar komi-collar-right"></div>
                                                    <div class="komi-bow">
                                                        <div class="komi-bow-top">
                                                            <div class="komi-bow-top-shadow"></div>
                                                        </div>
                                                        <div class="komi-bow-bottom"></div>
                                                    </div>
                                                </div>
                                                <div class="komi-shirt">
                                                    <div class="komi-shirt-sleeves"></div>
                                                    <div class="komi-shirt-sleeves-shadow"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="komi-zigzag komi-zigzag-1"></div>
                                        <div class="komi-zigzag komi-zigzag-2"></div>
                                        <div class="komi-zigzag komi-zigzag-3"></div>
                                        <div class="komi-zigzag komi-zigzag-4"></div>
                                        <div class="komi-zigzag komi-zigzag-5"></div>
                                        <div class="komi-zigzag komi-zigzag-6"></div>
                                        <div class="komi-zigzag komi-zigzag-7"></div>
                                        <div class="komi-zigzag komi-zigzag-8"></div>
                                        <div class="komi-zigzag komi-zigzag-9"></div>
                                        <div class="komi-zigzag komi-zigzag-10"></div>
                                        <div lang="ja" class="komi-buruburu">
                                            <span class="komi-buruburu-character komi-buruburu-character-1">
                                                ブ
                                            </span>
                                            <span class="komi-buruburu-character komi-buruburu-character-2">
                                                ル
                                            </span>
                                            <span class="komi-buruburu-character komi-buruburu-character-3">
                                                ル
                                            </span>
                                            <span class="komi-buruburu-character komi-buruburu-character-4">
                                                ル
                                            </span>
                                            <span class="komi-buruburu-character komi-buruburu-character-5">
                                                ル
                                            </span>
                                            <span class="komi-buruburu-character komi-buruburu-character-6">
                                                ル
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="hero-main-title text-center">
                                    <h1 class="hero-main-title-left font-medium text-white">On Click Generate <br>
                                        your favorite AI Image or <span class="word-piece-bg">Art</span></h1>

                                </div> --}}
                                <div class="hero-main-title text-center">
                                    <h1 class="hero-main-title-left font-medium text-white">
                                        {!! nl2br(e($banner->main_text ?? 'On Click Generate your favorite AI Image or')) !!}
                                        <span class="word-piece-bg">{{ $banner->special_text ?? 'Art' }}</span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->

        <!-- Brand Logo Slider Area Start -->
        {{-- <section class="brand-logo-slider-area home-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="section-heading text-white">Supported by many companies around the <span
                                    class="word-piece-bg">world</span></h3>
                        </div>

                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-12 col-carousel">
                        <div class="owl-carousel carousel-main brand-carousel brand-carousel-1">
                            <div class="single-logo"><img src="{{ asset('assets/img/logo-slider2/1-1.png') }}"
                                    alt=""></div>
                            <div class="single-logo"><img src="{{ asset('assets/img/logo-slider2/2-1.png') }}"
                                    alt=""></div>
                            <div class="single-logo"><img src="{{ asset('assets/img/logo-slider2/3-1.png') }}"
                                    alt=""></div>
                            <div class="single-logo"><img src="{{ asset('assets/img/logo-slider2/4-1.png') }}"
                                    alt=""></div>
                            <div class="single-logo"><img src="{{ asset('assets/img/logo-slider2/1-1.png') }}"
                                    alt=""></div>
                            <div class="single-logo"><img src="{{ asset('assets/img/logo-slider2/2-1.png') }}"
                                    alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <div class="section-title">
            <h3 class="section-heading text-white">
                {{ $brand->main_text ?? 'Supported by many companies around the' }}
                <span class="word-piece-bg">{{ $brand->special_text ?? 'world' }}</span>
            </h3>
        </div>

        <div class="owl-carousel carousel-main brand-carousel brand-carousel-1">
            @if ($brand && $brand->images)
                @foreach ($brand->images as $image)
                    <div class="single-logo">
                        <img src="{{ asset('storage/' . $image) }}" alt="brand logo">
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Brand Logo Slider Area End -->

        <!-- Generate Content Area Start -->
        <section id="feature" class="generate-content-area home-2 section-t-small-space position-relative">
            <img src="{{ asset('assets/img/home2-hero-floating-img.png') }}" alt="footer-bg"
                class="footer-bg-img theme-common-floating-bg-img position-absolute img-fluid">

            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading text-white">{{ $feature->main_title ?? 'AiLand' }}
                                <span class="word-piece-bg">{{ $feature->highlight_text ?? 'helps' }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="generate-content-row-wrap">
                    <div class="row justify-content-center">
                        @foreach ($boxes as $box)
                            <div class="col-md-6 col-lg-4 mb-25">
                                <div class="generate-content-box p-25">
                                    <div
                                        class="generate-icon d-flex align-items-center justify-content-center rounded-circle color-heading mb-20">
                                        <img src="{{ asset('storage/' . $box['image']) }}" alt="{{ $box['title'] }}"
                                            style="width: 48px; height: 48px; object-fit: contain;">
                                    </div>
                                    <h5 class="text-white mb-15">{{ $box['title'] }}</h5>
                                    <p>{{ $box['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        <!-- Generate Content Area End -->

        <!-- How It Works Area Start -->
        {{-- <section id="how-it-works" class="how-it-works-area home-2  section-t-small-space position-relative">
            <img src="{{ asset('assets/img/home2-hero-floating-img.png') }}" alt="footer-bg"
                class="footer-bg-img theme-common-floating-bg-img position-absolute img-fluid">

            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading text-white">How It <span class="word-piece-bg">Works</span>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="how-it-works-wrap">

                    <!-- How It Works Item Start -->
                    <div class="how-it-works-item section-b-80-space">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="how-it-works-area-item row align-items-center justify-content-center">
                                    <div class="col-md-6">
                                        <div class="how-it-works-item-left">
                                            <img src="{{ asset('assets/img/how-it-works-img/home-2-how-works-1.jpg') }}"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="how-it-works-item-right">
                                            <h3 class="how-it-works-item-title text-white">Create image or art great
                                                AI tools
                                            </h3>
                                            <ul class="pricing-features mt-25">
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Make make 88 plus text sentence</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">100+ Ads Integration</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Article 150+ sentence</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Make make 88 plus text sentence</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Blog style editor</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- How It Works Item End -->

                    <!-- How It Works Item Start -->
                    <div class="how-it-works-item section-b-80-space">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="how-it-works-area-item row align-items-center justify-content-center">
                                    <div class="col-md-6">
                                        <div class="how-it-works-item-left">
                                            <img src="{{ asset('assets/img/how-it-works-img/home-2-how-works-2.jpg') }}"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="how-it-works-item-right">
                                            <h3 class="how-it-works-item-title text-white">Create image or art great
                                                AI tools
                                            </h3>
                                            <ul class="pricing-features mt-25">
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Make make 88 plus text sentence</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">100+ Ads Integration</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Article 150+ sentence</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Make make 88 plus text sentence</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Blog style editor</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- How It Works Item End -->

                    <!-- How It Works Item Start -->
                    <div class="how-it-works-item section-b-80-space">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="how-it-works-area-item row align-items-center justify-content-center">
                                    <div class="col-md-6">
                                        <div class="how-it-works-item-left">
                                            <img src="{{ asset('assets/img/how-it-works-img/home-2-how-works-3.jpg') }}"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="how-it-works-item-right">
                                            <h3 class="how-it-works-item-title text-white">Create image or art great
                                                AI tools
                                            </h3>
                                            <ul class="pricing-features mt-25">
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Make make 88 plus text sentence</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">100+ Ads Integration</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Article 150+ sentence</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Make make 88 plus text sentence</span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2">
                                                    </span>
                                                    <span class="flex-grow-1">Blog style editor</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- How It Works Item End -->

                </div>

            </div>
        </section> --}}
        <section id="how-it-works" class="how-it-works-area home-2 section-t-small-space position-relative">
            <img src="{{ asset('assets/img/home2-hero-floating-img.png') }}" alt="footer-bg"
                class="footer-bg-img theme-common-floating-bg-img position-absolute img-fluid">

            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading text-white">{{ $howItWorks->main_title ?? 'How It' }}
                                <span class="word-piece-bg">{{ $howItWorks->highlight_text ?? 'Works' }}</span>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="video-container"
                            style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                            @php
                                $videoUrl = $howItWorks->video_url ?? '';
                                $videoId = '';

                                if (
                                    preg_match(
                                        '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                                        $videoUrl,
                                        $match,
                                    )
                                ) {
                                    $videoId = $match[1];
                                }
                            @endphp

                            <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Area End -->

        <!-- Pricing Area Start -->
        {{-- <section id="pricing" class="pricing-area home-2 bg-secondary section-t-space">
            <img src="{{ asset('assets/img/home2-hero-floating-img.png') }}" alt="footer-bg"
                class="footer-bg-img theme-common-floating-bg-img position-absolute img-fluid">

            <div class="pricing-area-bottom-part position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="section-heading text-white">Want More <span
                                        class="word-piece-bg">Feature</span>? Try Premium!</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Choose a plan content Start -->
                            <div class="choose-plan-area">
                                <div class="pricing-plan-area">
                                    <div class="row price-table-wrap">
                                        @foreach ($packages as $package)
                                            <div class="col-md-6 col-lg-4 mb-25">
                                                <div
                                                    class="price-card-item h-100 p-30 d-flex flex-column align-items-start justify-content-between">
                                                    <div class="w-100">
                                                        <h5 class="font-semi-bold text-white">{{ $package->name }}
                                                        </h5>
                                                        <hr>
                                                        <h2 class="price-title text-white mb-4">
                                                            ${{ $package->price }}<span
                                                                class="font-18 font-semi-bold">/m</span></h2>
                                                        <h5 class="font-semi-bold text-white mt-2">What’s included</h5>
                                                        <ul class="pricing-features">
                                                            @foreach ($package->features as $feature)
                                                                <li class="d-flex align-items-center mb-3">
                                                                    <span
                                                                        class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2"></span>
                                                                    <span
                                                                        class="flex-grow-1">{{ $feature }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <button type="button" class="theme-btn-outline mt-20 w-100"
                                                        data-bs-toggle="modal" data-bs-target="#paymentMethodModal"
                                                        title="Subscribe Now">
                                                        Subscribe Now
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Choose a plan content End -->
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section id="pricing" class="pricing-area home-2 bg-secondary section-t-space">
            @if ($packages->count() > 3)
                <div class="d-flex justify-content-between mt-3">
                    <button class="carousel-control-prev" type="button" data-bs-target="#pricingCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#pricingCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif
            <img src="{{ asset('assets/img/home2-hero-floating-img.png') }}" alt="footer-bg"
                class="footer-bg-img theme-common-floating-bg-img position-absolute img-fluid">

            <div class="pricing-area-bottom-part position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="section-heading text-white">Want More <span
                                        class="word-piece-bg">Feature</span>? Try Premium!</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Choose a plan content Start -->

                            <div class="choose-plan-area">
                                <div id="pricingCarousel" class="carousel slide" data-bs-ride="carousel"
                                    data-bs-interval="3000">
                                    <div class="carousel-inner">
                                        @foreach ($packages->chunk(3) as $chunkIndex => $chunk)
                                            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                                <div class="row price-table-wrap">
                                                    @foreach ($chunk as $package)
                                                        <div class="col-md-6 col-lg-4 mb-25">
                                                            <div
                                                                class="price-card-item h-100 p-30 d-flex flex-column align-items-start justify-content-between">
                                                                <div class="w-100">
                                                                    <h5 class="font-semi-bold text-white">
                                                                        {{ $package->name }}</h5>
                                                                    <hr>
                                                                    <h2 class="price-title text-white mb-4">
                                                                        ${{ $package->price }}<span
                                                                            class="font-18 font-semi-bold">/m</span>
                                                                    </h2>
                                                                    <h5 class="font-semi-bold text-white mb-4">
                                                                        Tokens: {{ $package->token }}
                                                                    </h5>
                                                                    <h5 class="font-semi-bold text-white mt-2">What’s
                                                                        included</h5>
                                                                    <ul class="pricing-features">
                                                                        @foreach ($package->features as $feature)
                                                                            <li class="d-flex align-items-center mb-3">
                                                                                <span
                                                                                    class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2"></span>
                                                                                <span
                                                                                    class="flex-grow-1">{{ $feature }}</span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <form class="add-to-cart-form"
                                                                    action="{{ route('cart.store') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $package->id }}">
                                                                    <input type="hidden" name="name"
                                                                        value="{{ $package->name }}">
                                                                    <input type="hidden" name="price"
                                                                        value="{{ $package->price }}">
                                                                    <input type="hidden" name="tokens"
                                                                        value="{{ $package->token }}">
                                                                    <button type="submit" class="theme-btn">Add to
                                                                        Cart</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Optional carousel controls -->
                                </div>
                            </div>
                            <!-- Choose a plan content End -->
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section id="pricing" class="pricing-area home-2 bg-secondary section-t-space">
            <img src="{{ asset('assets/img/home2-hero-floating-img.png') }}" alt="footer-bg"
                class="footer-bg-img theme-common-floating-bg-img position-absolute img-fluid">

            <div class="pricing-area-bottom-part position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="section-heading text-white">Want More <span
                                        class="word-piece-bg">Feature</span>? Try Premium!</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 position-relative">
                            <!-- Carousel Controls Outside -->
                            @if ($packages->count() > 3)
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#pricingCarousel" data-bs-slide="prev"
                                    style="left: -50px; width: auto;">
                                    <span class="carousel-control-prev-icon p-3 rounded-circle"
                                        aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#pricingCarousel" data-bs-slide="next"
                                    style="right: -50px; width: auto;">
                                    <span class="carousel-control-next-icon p-3 rounded-circle"
                                        aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif

                            <!-- Choose a plan content Start -->
                            <div class="choose-plan-area">
                                <div id="pricingCarousel" class="carousel slide" data-bs-ride="carousel"
                                    data-bs-interval="3000">
                                    <div class="carousel-inner">
                                        @foreach ($packages->chunk(3) as $chunkIndex => $chunk)
                                            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                                <div class="row price-table-wrap">
                                                    @foreach ($chunk as $package)
                                                        <div class="col-md-6 col-lg-4 mb-25">
                                                            <div
                                                                class="price-card-item h-100 p-30 d-flex flex-column align-items-start justify-content-between">
                                                                <!-- Package content remains the same -->
                                                                <div class="w-100">
                                                                    <h5 class="font-semi-bold text-white">
                                                                        {{ $package->name }}</h5>
                                                                    <hr>
                                                                    <h2 class="price-title text-white mb-4">
                                                                        ${{ $package->price }}<span
                                                                            class="font-18 font-semi-bold">/m</span>
                                                                    </h2>
                                                                    <h5 class="font-semi-bold text-white mb-4">
                                                                        Tokens: {{ $package->token }}
                                                                    </h5>
                                                                    <h5 class="font-semi-bold text-white mt-2">What's
                                                                        included</h5>
                                                                    <ul class="pricing-features">
                                                                        @foreach ($package->features as $feature)
                                                                            <li class="d-flex align-items-center mb-3">
                                                                                <span
                                                                                    class="price-check-icon flex-shrink-0 d-inline-flex align-items-center justify-content-center radius-50 me-2"></span>
                                                                                <span
                                                                                    class="flex-grow-1">{{ $feature }}</span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <form class="add-to-cart-form w-100"
                                                                    action="{{ route('cart.store') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $package->id }}">
                                                                    <input type="hidden" name="name"
                                                                        value="{{ $package->name }}">
                                                                    <input type="hidden" name="price"
                                                                        value="{{ $package->price }}">
                                                                    <input type="hidden" name="tokens"
                                                                        value="{{ $package->token }}">
                                                                    <button type="submit" class="theme-btn w-100">Add
                                                                        to Cart</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Pricing Area End -->

        <!-- FAQ Area Start -->
        <section id="faqs" class="faqs-area home-2 section-t-small-space position-relative">
            <img src="{{ asset('assets/img/home2-hero-floating-img.png') }}" alt="footer-bg"
                class="footer-bg-img theme-common-floating-bg-img position-absolute img-fluid">

            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading text-white"><span class="word-piece-bg">FAQ</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-8">
                        <div class="faq-content-box faq-left-part">
                            <!-- Accordion Start -->
                            <div class="accordion" id="accordionExample1">
                                @foreach ($faqs as $faq)
                                    <div class="accordion-item">
                                        <h5 class="accordion-header" id="heading{{ $faq->id }}">
                                            <button
                                                class="accordion-button font-medium {{ $loop->first ? '' : 'collapsed' }}"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $faq->id }}"
                                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                aria-controls="collapse{{ $faq->id }}">
                                                {{ $faq->question }}
                                            </button>
                                        </h5>
                                        <div id="collapse{{ $faq->id }}"
                                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                            aria-labelledby="heading{{ $faq->id }}"
                                            data-bs-parent="#accordionExample1">
                                            <div class="accordion-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Accordion End -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Area End -->

        <!-- Customer Testimonial Area Start -->
        <section class="customer-testimonial-area home-2 section-t-small-space position-relative">
            <img src="{{ asset('assets/img/home2-hero-floating-img.png') }}" alt="footer-bg"
                class="footer-bg-img theme-common-floating-bg-img position-absolute img-fluid">

            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="section-heading text-white">Our <span class="word-piece-bg">testimonial</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="owl-big owl-carousel owl-theme customer-testimonial-slider">
                            @foreach ($testimonials as $testimonial)
                                <div class="customer-testimonial-item position-relative radius-20 text-center">
                                    <div class="testimonial-top-part mb-3">
                                        <div class="customer-testimonial-img position-relative">
                                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt=""
                                                class="fit-image rounded-circle mx-auto mb-3">
                                            <div>
                                                <h5 class="testimonial-client-name">{{ $testimonial->client_name }}
                                                </h5>
                                                <p class="color-heading">{{ $testimonial->designation }}</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-quote position-relative">
                                            <span class="iconify" data-icon="clarity:block-quote-line"></span>
                                        </div>
                                    </div>
                                    <h6 class="customer-testimonial-text font-bold position-relative">
                                        {{ $testimonial->testimonial }}
                                    </h6>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Customer Testimonial Area End -->

        <!-- Cart Sidebar -->
        {{-- <x-cartbar></x-cartbar> --}}

        {{-- Add to Cart Area End --}}

        <!-- Footer Start -->
        <x-footer></x-footer>
        <!-- Footer End -->
</x-layout>
