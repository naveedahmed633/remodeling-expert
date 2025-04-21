@extends('layouts.admin-layout')
@section('title')
    Edit Blog
@endsection
@section('content')
    <style>
        .active {
            background-color: #007BFF !important;
            color: white !important;
        }

        .rating {
            width: 400px;
            height: 50px;
            margin: 0 auto;
            padding: 1px 99px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #f9f9f9;
        }

        .rating label {
            float: right;
            position: relative;
            width: 40px;
            height: 40px;
            cursor: pointer;
        }

        .rating label:not(:first-of-type) {
            padding-right: 2px;
        }

        .rating label:before {
            content: "\2605";
            font-size: 42px;
            color: #ccc;
            line-height: 1;
        }

        .rating label.active-star::before {
            color: #f9df4a;
        }

        .rating input {
            display: none;
        }

        .rating input:checked ~ label:before,
        .rating:not(:checked) > label:hover:before,
        .rating:not(:checked) > label:hover ~ label:before {
            color: #f9df4a;
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
                                <h3 class="card-title">Edit Blog</h3>
                                <a href="{{ route('admin.order.index') }}" class="btn btn-primary btn-sm float-right">
                                    Back
                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Name">Name *</label>
                                            <input type="text" class="form-control form__field" name="title"
                                                   placeholder="Service Title"
                                                   value="{{$order->name ?? ''}}" readonly>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Name">Phone *</label>
                                            <input type="text" class="form-control form__field" name="title"
                                                   placeholder="Service Title"
                                                   value="{{$order->phone ?? ''}}" readonly>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Name">Email *</label>
                                            <input type="text" class="form-control form__field" name="title"
                                                   placeholder="Service Title"
                                                   value="{{$order->email ?? ''}}" readonly>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Name">Message *</label>
                                            <textarea type="text" class="form-control form__field" name="title"
                                                      placeholder="Service Title"
                                                      rows="6" readonly>{{$order->message ?? ''}}</textarea>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <!-- /.card-body -->
                            <h4>Order Details</h4>
                            <br>
                            @php
                                $data = json_decode($order->services,true);

                            @endphp
                            <h4>Step 1: Selected Services</h4>
                            <ul>
                                @if (isset($data[0]['titles']) && is_array($data[0]['titles']))
                                    @foreach ($data[0]['titles'] as $title)
                                        <li>{{ $title }}</li>
                                    @endforeach
                                @else
                                    <li>No services selected.</li>
                                @endif
                            </ul>

                            <h4>Step 2: Selected Subcategories</h4>
                            <ul>
                                @if (isset($data[1]['titles']) && is_array($data[1]['titles']))
                                    @foreach ($data[1]['titles'] as $title)
                                        <li>{{ $title }}</li>
                                    @endforeach
                                @else
                                    <li>No subcategories selected.</li>
                                @endif
                            </ul>

                            <h4>Step 3: Remodel Type</h4>
                            <p>{{ isset($data[2]) ? ucfirst($data[2]) : 'N/A' }}</p>

                            <h4>Step 4: Specific Requirements</h4>
                            <ul>
                                @if (isset($data[3]['titles']) && is_array($data[3]['titles']))
                                    @foreach ($data[3]['titles'] as $title)
                                        <li>{{ $title }}</li>
                                    @endforeach
                                @else
                                    <li>No specific requirements selected.</li>
                                @endif
                            </ul>

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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 200
            });

            // Ensure summernote content is saved before form submit
            $('form').on('submit', function () {
                $('#summernote').val($('#summernote').summernote('code'));
            });

            // Image preview before upload
            $('#testimonialImageInput').on('change', function () {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
