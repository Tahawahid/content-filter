<x-layout>

    <x-preloader></x-preloader>

    <x-nav></x-nav>

    <!-- Page Banner Area Start -->
    <section class="page-banner-area">
        <img src="{{ asset('assets/img/hero-floating-img.png') }}" alt=""
            class="img-fluid position-absolute page-banner-bg-floating-img">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-banner-content position-relative">
                        <h2 class="text-white mb-2">Contact Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner Area End -->

    <!-- Inner Page Details Area Start -->
    <section class="inner-page-details contact-us-page section-t-space position-relative">
        <img src="{{ asset('assets/img/hero-floating-img.png') }}" alt="footer-bg"
            class="hero-top-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">

        <div class="container">
            <div class="row justify-content-center position-relative">

                <div class="col-md-12 col-lg-8">
                    <div class="inner-page-content contact-us-page-content bg-white theme-border radius-15">
                        <form class="contact-page-form">
                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <label class="label-text-title color-heading font-semi-bold mb-15">Your
                                        Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>
                                <div class="col-md-6 mb-30">
                                    <label class="label-text-title color-heading font-semi-bold mb-15">Your
                                        Email</label>
                                    <input type="email" class="form-control" placeholder="abraham@gmail.com">
                                </div>
                                <div class="col-md-6 mb-30">
                                    <label class="label-text-title color-heading font-semi-bold mb-15">Subject</label>
                                    <input type="text" class="form-control" placeholder="Enter your subject">
                                </div>
                                <div class="col-md-6 mb-30">
                                    <label class="label-text-title color-heading font-semi-bold mb-15">Mobile</label>
                                    <input type="text" class="form-control" placeholder="Your Mobile">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-30">
                                    <label class="label-text-title color-heading font-semi-bold mb-15">Message</label>
                                    <textarea cols="30" rows="5" class="form-control" placeholder="Type your message..."></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <button type="button" class="theme-btn">Send Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Inner Page Details Area End -->

    <!-- Map Area Start -->
    <section id="map" class="map-area section-t-small-space section-b-small-space position-relative">

        <img src="{{ asset('assets/img/hero-floating-img.png') }}" alt="footer-bg"
            class="faq-floating-bg-img theme-common-floating-bg-img position-absolute img-fluid">

        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
                    <div class="map-content">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.1178230972437!2d90.36952258551081!3d23.778818332653408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0b381a064f5%3A0x6199250d60d3a7f!2z4Kac4Ka-4Kak4KeA4KefIOCmuOCmguCmuOCmpiDgprjgpprgpr_gpqzgpr7gprLgp58g4KaG4Kas4Ka-4Ka44Ka_4KaVIOCmleCmruCmquCnjeCmsuCnh-CmleCnjeCmuA!5e0!3m2!1sen!2sbd!4v1695546185548!5m2!1sen!2sbd"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Area End -->

    <!-- Footer Start -->
    <x-footer></x-footer>
    <!-- Footer End -->
</x-layout>
