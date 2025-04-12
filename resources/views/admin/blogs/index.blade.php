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
                                <a href="{{ route('admin.blog.create') }}">
                                    <button type="button" class="btn btn-primary btn-sm float-right mb-5">
                                        Add Blog
                                    </button>
                                </a>
                                <h2>Blog Section</h2>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Heading</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($get_blogs as $blog)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $blog->heading ?: '' }}</td>

                                                <td>
                                                    <img
                                                        src="{{ $blog->blogImage('blog_image') ?: '' }}"style="width: 100px;height: 100px;">

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
                                                                href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}">Edit</a>
                                                            <a class="dropdown-item" id='delete-btn'
                                                                data-id="{{ $blog->id }}}">Delete</a>
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


            $(document).on("click", '#delete-btn', function(e) {
                var id = $(this).data('id');

                e.preventDefault();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                url: '{{ route('admin.blog.delete') }}',
                                type: "post",
                                dataType: "json",
                                data: {
                                    id: id
                                },
                                success: function(response) {
                                    toastr.success(response.success);

                                    window.location.reload();
                                },
                                error: function(response) {
                                    toastr.error('Something went wrong!');
                                }
                            });
                        } else {}
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
