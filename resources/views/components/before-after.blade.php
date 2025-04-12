<div class="container">
<section class="before-after-section py-5 text-center">
    <h2 class="section-title mb-4 fw-bold">Before & After</h2>
  
    <div class="image-compare-wrapper" aria-label="Before and After Image Slider">
      <div class="image-layer image-before">
        <img src="{{ asset('front/images/image.png') }}" alt="Before Image">
      </div>
      <div class="image-layer image-after">
        <img src="{{ asset('front/images/image.png') }}" alt="After Image">
      </div>
      <div class="divider-line" id="dividerLine"></div>
      <input type="range" min="0" max="100" value="50" id="imageSlider" class="slider-range" />
    </div>
  </section>
</div>
  