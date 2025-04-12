@extends('layouts.admin-layout')
@section('title', 'All Contact User')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12 mt-5">
                        <form class="category-form" method="post" action="{{route('admin.contact.save')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="card card-primary card-box-shadow">

                                <div class="card-body">
                                    <div class="tab-content text-center">

                                        <h2>Contact Section</h2>

                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <img id="topBannerImagePreview"
                                                     src="
                                                     {{isset($contacts) ? $contacts->pagesImage('contact_top_banner_image')  : asset('upload/No-Image.png') }}
                                                         "
                                                     alt="Profile Preview"
                                                     style="width:100%; height: 350px; margin-top: 10px;">
                                                <div class="form-group">
                                                    <label for="topBannerImageInput">Top Banner Image:</label>
                                                    <input type="file" class="form-control form__field visually-hidden"
                                                           name="contact_top_banner_image"
                                                           id="topBannerImageInput">
                                                    <label for="topBannerImageInput" class="file-input-label form__field form-control">
                                                        <i class="fas fa-camera"></i> Choose file
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Top Title</label>
                                                <input type="text" name="top_title" placeholder="Top Title"
                                                       class="form-control form__field"
                                                       value="{{$decodedData['top_title'] ??  ''}}">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Heading</label>
                                                <input type="text" name="heading" placeholder="Heading"
                                                       class="form-control form__field"
                                                       value="{{$decodedData['heading'] ?? ''}}">
                                            </div>

                                            <div class="col-md-12 mt-4">
                                                <div class="form-group">
                                                    <label for="name">Contact Description</label>
                                                    <textarea class="form-control form__field"
                                                              name="description"
                                                              id="side_footer"
                                                              rows="4"
                                                              placeholder="Description">{{$decodedData['description'] ?? ''}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <input type="submit" value="Submit" id="submit_btn" class="btn btn-primary">


                                    </div>

                                </div>
                            </div>
                        </form>

                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <div class="card card-primary card-box-shadow">

                            <div class="card-body">
                                <h2>Contact Section</h2>

                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>First Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
{{--                                        <th>status</th>--}}
{{--                                        <th>Edit</th>--}}
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($get_contacts as  $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$contact->first_name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td class="full-comment" style="cursor: pointer">
                                                {{ substr($contact->message, 0, 20) }}
                                                {{ strlen($contact->message) > 100 ? '...' : '' }}
                                                <input type="hidden" value="{{$contact->message}}"
                                                       class="comment-input">
                                            </td>
{{--                                            <td class="{{$contact->status === 1 ? 'text-success' : 'text-danger'}}">--}}
{{--                                                {{$contact->status === 1 ? 'Send The Complete Register Link To The User' : 'Not Send The Register Link'}}--}}
{{--                                            </td>--}}


{{--                                            <td>--}}
{{--                                                <div class="dropdown custom-dropdown">--}}
{{--                                                    <button class="btn btn-info" type="button" data-toggle="dropdown"--}}
{{--                                                            aria-expanded="false">--}}
{{--                                                        Click Here--}}
{{--                                                        <i class="fas fa-ellipsis-h fa-lg ml-2"></i>--}}
{{--                                                    </button>--}}
{{--                                                    <div class="dropdown-menu">--}}
{{--                                                        <a class="dropdown-item" href="{{route('admin.contact.edit',['id'=> $contact->id])}}">Edit</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}

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
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Message</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="rating-css">
                        <span id="modal-comment"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>

        $(document).ready(function () {
            $("table").DataTable({
            });
        });

    </script>
    <script>
        $(document).on('click', '.full-comment', function (e) {
            var comment = $(this).closest('.full-comment').find('.comment-input').val();
            $('#modal-comment').text(comment);
            $('#myModal').modal('show');
        });
    </script>
    <script>
        $('#summernote1').summernote({
            placeholder: 'Hello Admin',
            tabsize: 2,
            height: 100
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
