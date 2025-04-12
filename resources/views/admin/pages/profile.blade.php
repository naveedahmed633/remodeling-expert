@extends('layouts.admin-layout')
@section('title')
    Admin-Profile
@endsection
@section('content')
    <style>
        .active {
            background-color: #007BFF !important;
            color: white !important;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-box-shadow mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Admin Profile Update</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type='hidden' value='{{ Auth::user()->id }}' name='admin_id'>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">First Name:</label>
                                                <input type="text" class="form-control form__field" name="name"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Email:</label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Enter Name" id="Name"
                                                    style="min-height: 50px;padding: 14px;border-radius: 20px;"
                                                    value="{{ Auth::user()->email }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Address:</label>
                                                <input type="text" class="form-control form__field" name="address"
                                                    value="{{ Auth::user()->address }}"placeholder="Enter Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Phone Number:</label>
                                                <input type="text" class="form-control form__field" name="phone_number"
                                                    value="{{ Auth::user()->phone_number }}"placeholder="Enter Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="userProfileImageInput">Choose Profile:</label>
                                                <input type="file" class="form-control form__field visually-hidden"
                                                    name="admin_profile" id="userProfileImageInput"accept="image/*">
                                                <label for="userProfileImageInput"
                                                    class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>
                                                <small class='text-danger'>
                                                    @error('admin_profile')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <img id="userProfileImagePreview"
                                                    src="{{ $user->getFirstMediaUrl('admin_profile', 'dumb') ?: asset('front/images/No-Image.png') }}"
                                                    alt="Profile Preview"
                                                    style="width: 200px; height: 150px; margin-top: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-primary btn-sm w-25"
                                                value="Update Profile">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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

        const imageInput = document.getElementById('userProfileImageInput');
        imageInput.addEventListener('change', function() {
            showImagePreview(this, 'userProfileImagePreview');
        });
    </script>
@endsection
