@extends('layouts.admin-layout')
@section('title', 'All project')
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
                                {{--                                <a href="{{ route('admin.project.create') }}">--}}
                                {{--                                    <button type="button" class="btn btn-primary btn-sm float-right mb-5">--}}
                                {{--                                        Add Project--}}
                                {{--                                    </button>--}}
                                {{--                                </a>--}}

                                <h2>Project Section</h2>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $project->name ?: '' }}</td>
                                            <td>{{ $project->phone ?: '' }}</td>
                                            <td>{{ $project->email ?: '' }}</td>
                                            <td>
                                                <a class="dropdown-item"
                                                   href="{{ route('admin.order.view', $project->id) }}">View</a>
                                                <a class="dropdown-item delete-btn"
                                                   data-id="{{ $project->id }}">Delete</a>
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
        $(document).ready(function () {
            $("table").DataTable({});
        });
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on("click", ".delete-btn", function (e) {
                e.preventDefault();
                var id = $(this).data('id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Project!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "/admin/project/" + id,
                            type: "DELETE",
                            success: function (response) {
                                toastr.success(response.message);
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            },
                            error: function (xhr) {
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

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        const topBannerImageInput = document.getElementById('topBannerImageInput');
        topBannerImageInput.addEventListener('change', function () {
            showImagePreview(this, 'topBannerImagePreview');
        });
    </script>
@endsection
