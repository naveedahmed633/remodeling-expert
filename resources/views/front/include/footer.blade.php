<!-- Footer Section -->
<!-- Footer Section -->
<footer class="footer text-white pt-5" style="background: #001626">
    <div class="container">
        <div class="row align-items-start d-flex flex-wrap">
            <!-- First Section: Logo and Description -->
            <div class="col-lg-4 mb-5">
                <div class="navbar-brand text-start" style="white-space: normal;">
                    <!-- Logo and Title -->
                    <div class="d-flex align-items-center gap-2 my-3">
                        <img src="{{ asset('front/images/Vector.png') }}" alt="Logo" class="mb-0"
                            style="width: 40px;">
                        <div>
                            <div class="fw-bold text-white fw-bold">TOTAL UPGRADE</div>
                            <div class="fw-light text-white small fw-thin">REMODELING EXPERT</div>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="mb-3 fw-light text-white small">
                        At Remodelling Experts, we bring innovation, precision, and quality to every remodeling
                        project. With years of experience, our team specializes in creating stunning, functional
                        spaces that enhance your home’s beauty and value.
                    </p>

                    <!-- Social Media Icons -->
                    <div class="d-flex gap-3">
                        <a href="#" class="social-icon text-white" target="_blank" rel="noopener"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon text-white" target="_blank" rel="noopener"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon text-white" target="_blank" rel="noopener"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Second Section: Quick Links, Our Services, and Contact Us in One Line -->
            <div class="col-12 col-lg-8">
                <div class="d-flex flex-wrap justify-content-between">
                    <!-- Quick Links -->
                    <div class="col-12 col-lg-2 mb-4">
                        <h5 class="text-white fw-light">Quick Links</h5>
                        <ul class="list-unstyled" style="line-height: 35px;">
                            <li><a href="{{ route('index') }}" class="text-white font-weight-light">Home</a></li>
                            <li><a href="{{ route('about') }}" class="text-white font-weight-light">About Us</a></li>
                            <li><a href="{{ route('services') }}" class="text-white font-weight-light">Our Services</a></li>
                            <li><a href="{{ route('blog') }}" class="text-white font-weight-light">Blog</a></li>
                            <li><a href="{{ route('contact') }}" class="text-white font-weight-light">Contact us</a></li>
                        </ul>
                    </div>

                    <!-- Our Services -->
                    <div class="col-12 col-lg-3 mb-4">
                        <h5 class="text-white">Our Services</h5>
                        <ul class="list-unstyled" style="line-height: 35px;">
                            @foreach ($services->take(5) as $service)
                                <li>
                                    <a href="{{ route('service.detail', $service->id) }}" class="text-white">
                                        {{ $service->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Contact Us -->
                    <div class="col-12 col-lg-4 mb-4">
                        <h5 class="text-white">Contact Us</h5>
                        <ul class="list-unstyled contact" style="line-height: 35px;">
                            <li><a class="text-white"><i class="fas fa-phone" style="color: gray;"></i>
                                    (123) 456-7890</a></li>
                            <li><a class="text-white">📧 info@remodelingexperts.com</a></li>
                            <li><a class="text-white">📍 1234 Remodeling Lane, New York, NY 10001</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="row">
            <div class="col-12 text-center mt-4 pb-4">
                <hr class="border-white w-100 mb-4">
                <div class="d-flex justify-content-between flex-column flex-md-row text-start">
                    <p class="mb-0 text-white">Copyright © 2025Total Upgrade Remodeling Expert. All rights reserved.
                    </p>
                    <div class="d-flex">
                        <a href="#" class="text-white">Privacy Policy</a>
                        <span class="text-white mx-2">|</span>
                        <a href="#" class="text-white">Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('front/js/script.js') }}"></script>
<script src="{{ asset('front/js/aos.js') }}"></script>
@stack('script')
<script>
    AOS.init({
        offset: 20, // Trigger animation 120px pehle
        duration: 800,
        easing: 'ease-in-out',
        delay: 100,
    });
</script>
</body>

</html>
