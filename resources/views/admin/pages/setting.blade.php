@extends('layouts.admin-layout')
@section('title', 'All Contact User')
@section('content')
{{-- @dd($data) --}}
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12 mt-5">
                        <!-- general form elements -->
                        <div class="card card-dark card-box-shadow">
                            <div class="card-header">
                                <h3 class="card-title">Site Settings</h3>
                            </div>
                            <form class="category-form" method="post" action="{{ route('admin.setting.update') }}"
                                enctype="multipart/form-data">
                                <input type="hidden" name="media_collections[]" value="logo">
                                <input type="hidden" name="media_collections[]" value="footer_logo">
                                <input type="hidden" name="media_collections[]" value="fav_icon">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Site Title</label>
                                                <input type="text" class="form-control form__field" name="site_title"
                                                    value="{{ $content->site_title ?? '' }}" placeholder="site title">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <input type="email" class="form-control form__field" name="email"
                                                    id="email" required value="{{ $content->email ?? '' }}"
                                                    placeholder="email">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Phone No</label>
                                                <input type="text" class="form-control form__field" name="phone_num"
                                                    id="name" required value="{{ $content->phone_num ?? '' }}"
                                                    placeholder="Phone Number">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Address</label>
                                                <input type="text" class="form-control form__field" name="address"
                                                    id="name" required value="{{ $content->address ?? '' }}"
                                                    placeholder="Address">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Working Hours</label>
                                                <input type="text" class="form-control form__field" name="working_hours"
                                                    id="name" required value="{{ $content->address ?? '' }}"
                                                    placeholder="Working Hours">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Copy Right Content *</label>
                                                <input type="text" class="form-control form__field"
                                                    name="copy_right_content" id="heading" required
                                                    value="{{ $content->copy_right_content ?? '' }}"
                                                    placeholder="Copy Right Content">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Footer Description</label>
                                                <textarea name="footer_description" class="form-control form__field" id="footer_description" required>{{ $content->footer_description ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <h1 class="mt-4 mb-3">News Letter</h1>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">News Letter Title (Highlighted in Red)</label>
                                            <input type="text" class="form-control form__field" name="news_letter_heading_red"
                                                value="{{ $content->news_letter_heading_red ?? '' }}" placeholder="News Letter Heading">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">News Letter Title</label>
                                            <input type="text" class="form-control form__field" name="news_letter_heading"
                                                value="{{ $content->news_letter_heading ?? '' }}" placeholder="News Letter Heading">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Subscribe Button Text</label>
                                            <input type="text" class="form-control form__field" name="subscribe_btn_text"
                                                value="{{ $content->subscribe_btn_text ?? '' }}" placeholder="Subscribe Button Text">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Facebook Link</label>
                                            <input type="url" class="form-control form__field" name="facebook"
                                                value="{{ $content->facebook ?? '' }}" placeholder="Facebook Link">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Insta Link</label>
                                            <input type="url" class="form-control form__field" name="instagram"
                                                value="{{ $content->instagram ?? '' }}" placeholder="Insta Link">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">YouTube Link</label>
                                            <input type="url" class="form-control form__field" name="youtube"
                                                value="{{ $content->youtube ?? '' }}" placeholder="YouTube Link">
                                        </div>
                                    </div>

                                    <h1 class="mt-4 mb-3">Logos</h1>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="title">Header Logo *</label>
                                                <input type="file" class="form-control form__field" name="logo"
                                                    id="cta_image">
                                                @if ($data->hasMedia('logo') ?? '')
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($data->getMedia('logo') as $media)
                                                        <img src="{{ $media->getUrl() ?? '' }}" alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">        
                                                <label for="title">Footer Logo</label>
                                                <input type="file" class="form-control form__field" name="footer_logo"
                                                    id="cta_image">
                                                @if ($data->hasMedia('footer_logo') ?? '')
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($data->getMedia('footer_logo') as $media)
                                                        <img src="{{ $media->getUrl() ?? '' }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="title">Fav Icon</label>
                                                <input type="file" class="form-control form__field" name="fav_icon"
                                                    id="cta_image">
                                                @if ($data->hasMedia('fav_icon') ?? '')
                                                    <label for="existing_background_banner_image"></label>
                                                    @foreach ($data->getMedia('fav_icon') as $media)
                                                        <img src="{{ $media->getUrl() ?? '' }}"
                                                            alt="Existing Banner Image"
                                                            style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-primary">Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        function showImagePreview(input, previewId) {
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        const topBannerImageInput = document.getElementById('topBannerImageInput');
        topBannerImageInput.addEventListener('change', function() {
            showImagePreview(this, 'topBannerImagePreview');
        });

        const topFooterLogoInput = document.getElementById('topFooterLogoInput');
        topFooterLogoInput.addEventListener('change', function() {
            showImagePreview(this, 'topFooterLogoPreview');
        });

        const fav_icon = document.getElementById('fav_icon');
        fav_icon.addEventListener('change', function() {
            showImagePreview(this, 'favIconPreview');
        });


        $(document).on('click', '.old-top-banner-image', function() {
            var oldImage = $(this).data('old_to_banner_image');
            console.log(oldImage);
            $('<input>').attr({
                type: 'hidden',
                name: 'old_to_banner_image',
                value: oldImage
            }).appendTo('.add-old-to-banner-image-input');


        });


        const mainImageInput = document.getElementById('mainImageInput');
        mainImageInput.addEventListener('change', function() {
            showImagePreview(this, 'mainImagePreview');
        });

        $(document).on('click', '.old-main-image', function() {
            var oldImage = $(this).data('old_main_image');
            console.log(oldImage);
            $('<input>').attr({
                type: 'hidden',
                name: 'old_main_image',
                value: oldImage
            }).appendTo('.add-old-main-image-input');


        });
    </script>
@endsection
