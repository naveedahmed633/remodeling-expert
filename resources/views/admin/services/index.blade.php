@extends('layouts.admin-layout')
@section('title', 'All Blogs')
@section('content')
    <style>
        .active-star {
            color: #f9df4a;
        }
    </style>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card card-primary card-box-shadow">
                            <div class="card-body">
                                <a href="{{ route('admin.service.create') }}">
                                    <button type="button" class="btn btn-primary btn-sm float-right mb-5">
                                        Add Service
                                    </button>
                                </a>
                                <h2>Service Section</h2>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Title</th>
                                            <th>description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $service->title ?: '' }}</td>
                                                <td>{{ Str::limit(strip_tags($service->description), 40) ? : '' }}</td>
                                                <td>
                                                    @if($service->image)
                                                    <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}" class="img-fluid mb-3" style="width: 100px;height: 100px;">
                                                @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown custom-dropdown">
                                                        <button class="btn btn-info" type="button" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Click Here
                                                            <i class="fas fa-ellipsis-h fa-lg ml-2"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.service.edit', $service->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                               href="{{ route('admin.service.category.index', $service->id) }}">Categories</a>
                                                            <a class="dropdown-item delete-btn"
                                                                data-id="{{ $service->id }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            $("table").DataTable({});
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on("click", ".delete-btn", function(e) {
                e.preventDefault();
                var id = $(this).data('id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this blog!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "/admin/service/" + id,
                            type: "DELETE",
                            success: function(response) {
                                toastr.success(response.message);
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            },
                            error: function(xhr) {
                                toastr.error("Something went wrong!");
                            }
                        });
                    }
                });
            });
        });
    </script>

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
    </script>
@endsection
