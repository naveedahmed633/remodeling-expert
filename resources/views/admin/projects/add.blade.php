@extends('layouts.admin-layout')
@section('title')
    Add Project
@endsection
@section('content')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
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

        .rating input {
            display: none;
        }

        .rating input:checked~label:before,
        .rating:not(:checked)>label:hover:before,
        .rating:not(:checked)>label:hover~label:before {
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
                                <h3 class="card-title">Add Projects</h3>
                                <a href="{{ route('admin.project.index') }}" class="btn btn-primary btn-sm float-right">
                                    Back
                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                
                                        <!-- Project Title -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Project Title *</label>
                                                <input type="text" class="form-control form__field" name="title"
                                                    placeholder="Project Title" value="{{ old('title') }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('title')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                
                                        <!-- Project Image -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mainImageInput">Project Main Image *</label>
                                                <input type="file" id="mainImageInput" class="form-control form__field visually-hidden" name="image"
                                                    accept="image/*">
                                                <label for="mainImageInput" class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>
                                                <small class='text-danger'>
                                                    @error('image')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                
                                        <!-- Short Description -->
                                        <div class="col-md-12">
                                            <label for="">Project Description *</label>
                                            <textarea name="description" id="summernote" placeholder="Description" class="form-control form__field">{{ old('description') }}</textarea>
                                            <small class="text-danger">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                
                                        <!-- Client -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Client *</label>
                                                <input type="text" class="form-control form__field" name="client"
                                                    placeholder="Client" value="{{ old('client') }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('client')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                
                                        <!-- Year -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Year *</label>
                                                <input type="text" class="form-control form__field" name="year"
                                                    placeholder="Year" value="{{ old('year') }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('year')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                
                                        <!-- Author -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Name">Author *</label>
                                                <input type="text" class="form-control form__field" name="author"
                                                    placeholder="Author" value="{{ old('author') }}">
                                            </div>
                                            <small class="text-danger">
                                                @error('author')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                
                                        <!-- More About This Project -->
                                        <div class="col-md-12">
                                            <label for="">More About This Project *</label>
                                            <textarea name="description1" id="summernote2" placeholder="More About This Project" class="form-control form__field">{{ old('description1') }}</textarea>
                                            <small class="text-danger">
                                                @error('description1')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                
                                        <!-- Project Additional Images -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image1Input">Project Additional Image 1 *</label>
                                                <input type="file" id="image1Input" class="form-control form__field visually-hidden" name="image1"
                                                    accept="image/*">
                                                <label for="image1Input" class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>
                                                <small class='text-danger'>
                                                    @error('image1')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image2Input">Project Additional Image 2 *</label>
                                                <input type="file" class="form-control form__field visually-hidden" name="image2" id="image2Input"
                                                    accept="image/*">
                                                <label for="image2Input" class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>
                                                <small class='text-danger'>
                                                    @error('image2')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                
                                        <!-- Project Additional Image 3 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image3Input">Project Additional Image 3 *</label>
                                                <input type="file" id="image3Input" class="form-control form__field visually-hidden" name="image3"
                                                    accept="image/*">
                                                <label for="image3Input" class="file-input-label form__field form-control">
                                                    <i class="fas fa-camera"></i> Choose file
                                                </label>
                                                <small class='text-danger'>
                                                    @error('image3')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                
                                        <!-- Submit Button -->
                                        <div class="mx-auto mt-5">
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary btn-sm" value="Submit">
                                            </div>
                                        </div>
                                
                                    </div>
                                </form>
                                
                            </div>
                            <!-- /.card-body -->
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

    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize both editors
            $('#summernote').summernote({
                height: 200
            });

            $('#summernote2').summernote({
                height: 200
            });

            // On form submit, set their values
            $('form').on('submit', function() {
                $('#summernote').val($('#summernote').summernote('code'));
                $('#summernote2').val($('#summernote2').summernote('code'));
            });
        });
    </script>
@endsection
