@extends('layouts.admin-layout')

@section('title', 'Edit Blog')

@section('content')
    <style>
        .form__field[readonly] {
            background-color: #f5f5f5;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        ul.service-list {
            list-style: disc;
            padding-left: 20px;
        }
    </style>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-box-shadow mt-5">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title mb-0">Order View</h3>
                                <a href="{{ route('admin.order.index') }}" class="btn btn-primary btn-sm">Back</a>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control form__field" value="{{ $order->name ?? '' }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone *</label>
                                        <input type="text" class="form-control form__field" value="{{ $order->phone ?? '' }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email *</label>
                                        <input type="text" class="form-control form__field" value="{{ $order->email ?? '' }}" readonly>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="message">Message *</label>
                                        <textarea class="form-control form__field" rows="5" readonly>{{ $order->message ?? '' }}</textarea>
                                    </div>
                                </div>

                                @php
                                    $data = json_decode($order->services, true);
                                @endphp

                                <div class="section-title">Order Details</div>

                                <div class="mt-3">
                                    <div class="section-title">Step 1: Selected Services</div>
                                    <ul class="service-list">
                                        @if (!empty($data[0]['titles']) && is_array($data[0]['titles']))
                                            @foreach ($data[0]['titles'] as $title)
                                                <li>{{ $title }}</li>
                                            @endforeach
                                        @else
                                            <li>No services selected.</li>
                                        @endif
                                    </ul>
                                </div>

                                <div class="mt-3">
                                    <div class="section-title">Step 2: Selected Subcategories</div>
                                    <ul class="service-list">
                                        @if (!empty($data[1]['titles']) && is_array($data[1]['titles']))
                                            @foreach ($data[1]['titles'] as $title)
                                                <li>{{ $title }}</li>
                                            @endforeach
                                        @else
                                            <li>No subcategories selected.</li>
                                        @endif
                                    </ul>
                                </div>

                                <div class="mt-3">
                                    <div class="section-title">Step 3: Remodel Type</div>
                                    <p>{{ isset($data[2]) ? ucfirst($data[2]) : 'N/A' }}</p>
                                </div>

                                <div class="mt-3">
                                    <div class="section-title">Step 4: Specific Requirements</div>
                                    <ul class="service-list">
                                        @if (!empty($data[3]['titles']) && is_array($data[3]['titles']))
                                            @foreach ($data[3]['titles'] as $title)
                                                <li>{{ $title }}</li>
                                            @endforeach
                                        @else
                                            <li>No specific requirements selected.</li>
                                        @endif
                                    </ul>
                                </div>

                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->

                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('script')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 200
            });

            $('form').on('submit', function () {
                $('#summernote').val($('#summernote').summernote('code'));
            });

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
