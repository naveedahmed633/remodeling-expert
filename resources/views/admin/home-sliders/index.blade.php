@extends('layouts.admin-layout')
@section('title', 'All About Home Header Slider ')
@section('content')

    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12 mt-5">

                        <div class="card card-primary card-box-shadow">

                            <div class="card-body">
                                <a href="{{ route('admin.slider.create') }}">
                                    <button type="button" class="btn btn-primary btn-sm float-right mb-5">
                                        Add Header Slider
                                    </button>
                                </a>
                                <h2>Home Header Slider Section</h2>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Heading</th>
                                            <th>Button Text</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse($get_sliders as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->btn_text }}</td>
                                                <td> <img src="{{ $item->sliderImage('slider_image') }}" alt=""
                                                        width="100px"></td>
                                                <td>
                                                    <div class="dropdown custom-dropdown">
                                                        <button class="btn btn-info" type="button" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Click Here
                                                            <i class="fas fa-ellipsis-h fa-lg ml-2"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.slider.edit', ['id' => $item->id]) }}">Edit</a>
                                                            <a class="dropdown-item" id='delete-btn'
                                                                data-id="{{ $item->id }}}">Delete</a>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @empty
                                            <p>no data found</p>
                                        @endforelse

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
                                url: '{{ route('admin.slider.delete') }}',
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
@endsection
