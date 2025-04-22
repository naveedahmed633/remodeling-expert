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
                                <button type="button" class="btn btn-primary btn-sm float-right mb-5"
                                        data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                    Add Sub Category
                                </button>

                                <h2>Service Sub Category Section</h2>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sub Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($subCategory as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name ?: 'N/A' }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                                    <a href="javascript:void(0);"
                                                       class="btn btn-sm btn-outline-primary"
                                                       title="Edit Category"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#editCategoryModal"
                                                       data-id="{{ $category->id }}"
                                                       data-name="{{ $category->name }}">
                                                        <i class="fas fa-pencil"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.delete.service.type', ['type'=>'subcategory','id' => $category->id]) }}"
                                                        style="display:inline-block;" onsubmit="return confirmDelete()">

                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                title="Delete Category">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
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

    <!-- Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.add.service.type', ['type' => 'subcategory','id' => $id]) }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryLabel">Add Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Sub Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="editCategoryForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Sub Category Name</label>
                            <input type="text" class="form-control" id="editCategoryName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $("table").DataTable({});
        });
    </script>
    <script>
        const editModal = document.getElementById('editCategoryModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            const input = editModal.querySelector('#editCategoryName');
            input.value = name;

            const form = editModal.querySelector('#editCategoryForm');
            form.action = `{{asset('admin/update/service/subcategory')}}/${id}`; // or use route helper via JS if dynamic
        });
    </script>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this category?');
        }
    </script>

@endpush
