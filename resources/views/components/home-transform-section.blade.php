<section class="py-5" style="">
    <div class="container position-relative">
        <div class="row mb-5">
            <!-- Image Column -->
            <div class="col-md-6">
                <img src="{{ asset($imagePath) }}"
                    alt="Sample" class="img-fluid w-100">
            </div>

            <!-- Content Box Overlapping -->
            <div class="col-md-7 position-absolute top-50 end-0 translate-middle-y bg-white p-5 shadow"
                style="z-index: 10;">
                <h3 class="mb-3 text-start">{{ $content['estimate_section_heading'] ?? '' }}</h3>
                <p class="text-start">{{ $paragraphOne }}</p>
                <p class="text-start">{{ $paragraphTwo }}</p>
                <p class="text-start">{{ $paragraphThree }}</p>
                <div class="text-start mt-4">
                    <a href="{{ $buttonUrl }}" class="btn btn-primary p-3">{{ $buttonText }}</a>
                </div>
            </div>
        </div>
    </div>
</section>