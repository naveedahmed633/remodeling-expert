@extends('layouts.admin-layout')
@section('title', 'All Multi-Step Forms')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card card-primary card-box-shadow">
                            <div class="card-body">
                                <a href="{{ route('admin.form.create') }}">
                                    <button type="button" class="btn btn-primary btn-sm float-right mb-5">
                                        Add New Form
                                    </button>
                                </a>
                                <h2>Multi-Step Forms</h2>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Form Title</th>
                                            <th>Total Steps</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $form)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $form->title }}</td>
                                                <td>{{ $form->steps_count ?? '-' }}</td>
                                                <td>{{ $form->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown">
                                                        <button class="btn btn-info" type="button" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Click Here
                                                            <i class="fas fa-ellipsis-h fa-lg ml-2"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.form.edit', $form->id) }}">Edit</a>
                                                            <a class="dropdown-item delete-btn"
                                                                data-id="{{ $form->id }}">Delete</a>
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
            $("table").DataTable();
        });

        $(document).on("click", ".delete-btn", function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this form!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/admin/form/" + id,
                        type: "DELETE",
                        success: function(response) {
                            toastr.success(response.message);
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function() {
                            toastr.error("Something went wrong!");
                        }
                    });
                }
            });
        });
    </script>
@endsection
