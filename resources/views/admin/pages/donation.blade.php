@extends('layouts.admin-layout')
@section('title', 'Donation Page Cms')
@section('content')

    <div class="content-wrapper">

        <section class="content ">
            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12 mt-5">
                        <form action="{{ route('admin.pages.update', ['slug' => $page->slug]) }}" method="post"
                            class="category-form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="slug" value="{{ $page->slug }}">
                            <input type="hidden" name="media_collections[]" value="banner_image">
                            <input type="hidden" name="media_collections[]" value="reach">
                            <input type="hidden" name="media_collections[]" value="star_image">
                            <input type="hidden" name="media_collections[]" value="back_image">
                            <div class="card card-dark card-box-shadow">
                                <div class="card-header">
                                    <h3 class="card-title">(Donation Page)</h3>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content text-center">

                                        <h2 class="text-center mb-5">Banner Section</h2>

                                        <div class="row">
                                            <!-- Banner Section -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Banner Title</label><br>
                                                    <input type="text" required class="form-control form__field"
                                                        name="banner_heading" id="title"
                                                        value="{{ $content['banner_heading'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="banner_image">Banner Image</label><br>
                                                    <input type="file" class="form-control form__field"
                                                        name="banner_image" id="cta_image">
                                                    @if ($page->hasMedia('banner_image'))
                                                        <label for="existing_background_banner_image"></label>
                                                        @foreach ($page->getMedia('banner_image') as $media)
                                                            <img src="{{ $media->getUrl() }}" alt="Existing Banner Image"
                                                                style="max-width: 200px; max-height: 200px; margin-top: 10px; background-color: black">
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="text-center my-5">Donation Section</h2>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Description 1 *</label>
                                                <textarea class="form-control form__field" name="don_sec_pera" placeholder="Description">{{ $content['don_sec_pera'] ?? '' }}</textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Description 2 *</label>
                                                <textarea class="form-control form__field" name="don_sec_para1" placeholder="Description">{{ $content['don_sec_para1'] ?? '' }}</textarea>
                                            </div>
                                          
                                            <div class="col-md-4">
                                                <label for="">Heading 1 *</label>
                                                <input type="text" name="don_sec_imp1_head" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_sec_imp1_head'] ?? '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Heading 2 *</label>
                                                <input type="text" name="don_sec_imp2_head" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_sec_imp2_head'] ?? '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Heading 3 *</label>
                                                <input type="text" name="don_sec_imp3_head" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_sec_imp3_head'] ?? '' }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Price 1 *</label>
                                                <input type="text" name="don_price_1" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_price_1'] ?? '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Price 2 *</label>
                                                <input type="text" name="don_price_2" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_price_2'] ?? '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Price 3 *</label>
                                                <input type="text" name="don_price_3" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_price_3'] ?? '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">button Text 1 *</label>
                                                <input type="text" name="don_sec_btn1" class="form-control form__field"
                                                    required value="{{ $content['don_sec_btn1'] ?? '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">button Text 2 *</label>
                                                <input type="text" name="don_sec_btn2" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_sec_btn2'] ?? '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Type 1 *</label>
                                                <input type="text" name="don_time_type1" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_time_type1'] ?? '' }}">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Type 2 *</label>
                                                <input type="text" name="don_time_type2" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_time_type2'] ?? '' }}">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Choose Heading 1 *</label>
                                                <input type="text" name="don_choos_1" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_choos_1'] ?? '' }}">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Choose Heading 2 *</label>
                                                <input type="text" name="don_choos_2" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_choos_2'] ?? '' }}">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Choose Heading 3 *</label>
                                                <input type="text" name="don_choos_3" required
                                                    class="form-control form__field"
                                                    value="{{ $content['don_choos_3'] ?? '' }}">
                                            </div>

                                           


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Image 1*</label>
                                                    <input type="file" class="form-control form__field" name="back_image"
                                                        id="cta_image">
                                                    @if ($page->hasMedia('back_image'))
                                                        <label for="existing_background_banner_image"></label>
                                                        @foreach ($page->getMedia('back_image') as $media)
                                                            <img src="{{ $media->getUrl() }}" alt="Existing Banner Image"
                                                                style="max-width: 200px; max-height: 200px; margin-top: 10px; background-color: black">
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Image 1*</label>
                                                    <input type="file" class="form-control form__field" name="star_image"
                                                        id="cta_image">
                                                    @if ($page->hasMedia('star_image'))
                                                        <label for="existing_background_banner_image"></label>
                                                        @foreach ($page->getMedia('star_image') as $media)
                                                            <img src="{{ $media->getUrl() }}" alt="Existing Banner Image"
                                                                style="max-width: 200px; max-height: 200px; margin-top: 10px; background-color: black">
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="text-center my-5">Reach Out Section</h2>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Heading 1 *</label>
                                                <input type="text" name="rec_sec_head1" class="form-control form__field"
                                                    required value="{{ $content['rec_sec_head1'] ?? '' }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Heading 2 *</label>
                                                <input type="text" name="rec_sec_head2" required
                                                    class="form-control form__field"
                                                    value="{{ $content['rec_sec_head2'] ?? '' }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Button Text*</label>
                                                <input type="text" name="rec_sec_btn" required
                                                    class="form-control form__field"
                                                    value="{{ $content['rec_sec_btn'] ?? '' }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Description *</label>
                                                <textarea class="form-control form__field" name="rec_sec_des1" placeholder="Description">{{ $content['rec_sec_des1'] ?? '' }}</textarea>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Image *</label>
                                                    <input type="file" class="form-control form__field" name="reach"
                                                        id="cta_image">
                                                    @if ($page->hasMedia('reach'))
                                                        <label for="existing_background_banner_image"></label>
                                                        @foreach ($page->getMedia('reach') as $media)
                                                            <img src="{{ $media->getUrl() }}" alt="Existing Banner Image"
                                                                style="max-width: 200px; max-height: 200px; margin-top: 10px; background-color: black">
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="text-center">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                            <br>
                        </form>

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


        const ourDrinkHomeSecondSecImageInput = document.getElementById('ourDrinkHomeSecondSecImageInput');
        ourDrinkHomeSecondSecImageInput.addEventListener('change', function() {
            showImagePreview(this, 'ourDrinkPageFirstImagePreview');
        });
    </script>
@endsection
