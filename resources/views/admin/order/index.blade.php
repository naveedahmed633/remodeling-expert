@extends('layouts.admin-layout')
@section('title', 'All Projects')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-box-shadow">
                        <div class="card-body">
                            <h2 class="mb-4">Project Section</h2>

                            <table id="projectTable" class="table table-striped table-bordered">
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
                                            <td>{{ $project->name ?? '' }}</td>
                                            <td>{{ $project->phone ?? '' }}</td>
                                            <td>{{ $project->email ?? '' }}</td>
                                            <td>
                                                <a href="{{ route('admin.order.view', $project->id) }}" class="btn btn-sm btn-info">View</a>
                                                <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $project->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#projectTable').DataTable();

        // CSRF setup for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Delete handler
        $(document).on("click", ".delete-btn", function (e) {
            e.preventDefault();
            const id = $(this).data('id');

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this project!",
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
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function () {
                            toastr.error("Something went wrong!");
                        }
                    });
                }
            });
        });

        // Preview image (if needed in future forms)
        $('#topBannerImageInput').on('change', function () {
            const input = this;
            const preview = document.getElementById('topBannerImagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>
@endsection
