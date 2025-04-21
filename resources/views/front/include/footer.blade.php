<!-- Footer Section -->
<footer class="footer text-white pt-5" style="background: #001626">
    <div class="container">
        <div class="row">
            <!-- First Section: Logo and Description -->
            <div class="col-md-3 mt-4">
                <div class="navbar-brand text-start" style="white-space: normal;">
                    <div class="d-flex justify-content-start align-items-center my-3">
                        <img data-aos="zoom-out-up" src="{{ asset('front/images/logo_1.png') }}" alt="Logo" class="mb-2 mr-3">
                        <div data-aos="zoom-out-up">
                            <span class="font-weight-bold" >TOTAL UPGRADE</span>
                            <span class="font-weight-light">REMODELING EXPERT</span>
                        </div>
                    </div>

                    <p data-aos="zoom-out-up" class="mb-3">At Remodelling Experts, we bring innovation, precision, and quality to every
                        remodeling project. With years of experience, our team specializes in creating stunning,
                        functional spaces that enhance your home’s beauty and value.</p>
                    <!-- Social Media Icons -->
                    <div data-aos="zoom-out-up" class="d-flex">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Second Section: Quick Links -->
            <div class="col-md-3 d-flex flex-column justify-content-center lh-lg mt-4">
                <h5 class="text-white" data-aos="zoom-out-up">Quick Links</h5>
                <ul class="list-unstyled " data-aos="zoom-out-up">
                    <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-white">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="text-white">Services</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white">Contact</a></li>
                    <li><a href="{{ route('blog') }}" class="text-white">Blog</a></li>
                </ul>
            </div>

            <!-- Third Section: Services -->
            <div class="col-md-3 d-flex flex-column justify-content-center lh-lg mt-4">
                <h5 class="text-white" data-aos="zoom-out-up">Our Services</h5>
                <ul class="list-unstyled" data-aos="zoom-out-up">
                    @foreach ($services->take(5) as $service)
                        <li>
                            <a href="{{ route('service.detail', $service->id) }}" class="text-white">
                                {{ $service->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Fourth Section: Contact Us -->
            <div class="col-md-3 d-flex flex-column justify-content-center lh-lg mt-4">
                <h5 class="text-white" data-aos="zoom-out-up">Contact Us</h5>
                <ul class="list-unstyled" data-aos="zoom-out-up">
                    <li><a class="text-white">Phone: +123 456 7890</a></li>
                    <li><a class="text-white">Email: info@website.com</a></li>
                    <li><a class="text-white">Address: 123 Main Street, City, Country</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Section: Divider Line and Copyright & Policy Links -->
        <div class="row">
            <div class="col-12 text-center mt-4 pb-4">
                <hr class="border-white w-100 mb-4">
                <div class="d-flex justify-content-between text-start">
                    <p class="mb-0 text-white">Copyright © 2025Total Upgrade Remodeling Expert. All rights reserved.</p>
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
<script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>
</body>

</html>
