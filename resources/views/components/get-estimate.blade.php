{{-- Ye line zaroori nahi agar aap constructor se pass kar rahe ho --}}
@props(['content', 'data'])


<section class="py-5" style="background-color: #001626;">
    <div class="container">
        <!-- Main Heading -->
        <div class="text-center mb-4">
            <h2 class="text-white">{{ $content['estimate_section_heading'] ?? '' }}</h2>
            <p class="text-white">{{ $content['estimate_section_description'] ?? '' }}</p>
        </div>

        <!-- Sub-sections -->
        <div class="row text-center p-5">
            <!-- Sub-section 1 -->
            <div class="col-md-3 mb-4">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ $data?->getFirstMediaUrl('estimate_image_1') ?? ''}}" alt="Icon 1" class="mb-3" style="width: 50px; height: 50px;">
                    <h5 class="text-white">{{ $content['estimate_image_heading_1'] ?? '' }}</h5>
                    <p class="text-white">{{ $content['estimate_image_desc_1'] ?? '' }}</p>
                </div>
            </div>

            <!-- Sub-section 2 -->
            <div class="col-md-3 mb-4">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ $data?->getFirstMediaUrl('estimate_image_2') ?? ''}}" alt="Icon 2" class="mb-3" style="width: 50px; height: 50px;">
                    <h5 class="text-white">{{ $content['estimate_image_heading_2'] ?? '' }}</h5>
                    <p class="text-white">{{ $content['estimate_image_desc_2'] ?? '' }}</p>
                </div>
            </div>

            <!-- Sub-section 3 -->
            <div class="col-md-3 mb-4">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ $data?->getFirstMediaUrl('estimate_image_3') ?? ''}}" alt="Icon 3" class="mb-3" style="width: 50px; height: 50px;">
                    <h5 class="text-white">{{ $content['estimate_image_heading_3'] ?? '' }}</h5>
                    <p class="text-white">{{ $content['estimate_image_desc_3'] ?? '' }}</p>
                </div>
            </div>

            <!-- Sub-section 4 -->
            <div class="col-md-3 mb-4">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ $data?->getFirstMediaUrl('estimate_image_4') ?? ''}}" alt="Icon 4" class="mb-3" style="width: 50px; height: 50px;">
                    <h5 class="text-white">{{ $content['estimate_image_heading_4'] ?? '' }}</h5>
                    <p class="text-white">{{ $content['estimate_image_desc_4'] ?? '' }}</p>
                </div>
            </div>
        </div>

        <!-- Button at the End -->
        <div class="text-center mt-4">
            <a href="{{ $content['estimate_button_url'] ?? '' }}" class="btn btn-primary p-3">{{ $content['estimate_button_text'] ?? '' }}</a>
        </div>
    </div>
</section>
