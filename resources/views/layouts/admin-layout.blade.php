<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/fontawesome/css/fontawesome-6-1-1.min.css')}}">
<!-- <link rel="stylesheet" href="{{asset('admin-assets/fontawesome-free/css/all.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
{{--    <link rel="shortcut icon" href="{{ $setting->settingImage('fav_icon') }}" type="image/x-icon">--}}

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin-assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/font/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/css/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/css/bootstrap4-toggle.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/css/select2.min.css')}}">

    <script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/adminlte.js')}}"></script>
    <script src="{{asset('admin-assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('admin-assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/bootstrap4-toggle.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="{{asset('admin-assets/js/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/toastr.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/select2.min.js')}}"></script>
@yield('css')
</head>
<style>
    th, td {
        font-size: 15px !important;
    }

    th {
        font-weight: normal;
        color: #FFFFFF;
        background-color: #343A40;
    }

    .table-shadow {
        /*box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;*/
        border-style: solid;
        border-color: red;
    }
    .note-editable{
        height: 170px!important;
    }

    .custom-dropdown .dropdown-menu {
        display: block;
        opacity: 0;
        visibility: hidden;
        top: 4rem;
        transform: scale(0.9);
        transition: 0.2s ease-in-out;
    }

    .custom-dropdown .dropdown-menu::before{
        content: '';
        position: absolute;
        top: -8px;
        left: 1rem;
        width: 16px;
        height: 10px;
        background: white;
        clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
    }
    .custom-dropdown .dropdown-menu.show {
        opacity: 1;
        visibility:visible;
        top: 0;
        transform: scale(1);
    }
    .custom-dropdown .dropdown-menu a:hover{
        background: var(--primary);
        color: var(--white);
    }

    #delete-btn{
        cursor: pointer;
    }
    .card-box-shadow{
        box-shadow: rgba(61, 55, 238, 0.15) 0px 2px 6px 5px; !important;
    }

    .note-frame{
        box-shadow: rgba(61, 55, 238, 0.15) 0px 2px 6px 5px; !important;
    }

    .form__field {
        background: #fff;
        font: inherit;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 10px 2px;
        border: 0;
        outline: 0;
        border-radius: 20px;
        min-height: 50px;
        padding: 14px;
        position: relative;
    }

    input[type=text]:focus,
    input[type=file]:focus,
    input[type=number]:focus,
    input[type=password]:focus,
    input[type=email]:focus,
    textarea:focus {
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 10px 2px !important;
    }

    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
        cursor: pointer !important;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover,
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
        -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 10px 2px !important;
        transition: background-color 4000s ease-in-out 0s;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake"
             src="{{ isset($setting) ? $setting->cmsImages('footer_logo') : asset('front/images/No-Image.png')}}" alt="AdminLTELogo"
             height="60" width="60">
    </div>

    @include('admin.includes.admin-navbar')
    @include('admin.includes.admin-sidebar')


    @yield('content')

{{--    <footer class="main-footer text-center">--}}
{{--        <strong>{{$setting->footer_copyright_description ?? ''}}</strong>--}}
{{--    </footer>--}}

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control Sidebar Content -->
        <div class="p-3">
            <h5>Settings</h5>
            <hr>

            <!-- Dark Mode Toggle -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="darkModeToggle">
                <label class="form-check-label" for="darkModeToggle">Dark Mode</label>
            </div>


            <!-- Additional Features -->
            <h6 class="mt-3">Additional Features</h6>
            <ul class="list-unstyled mb-0">

                <li><a href="{{ route('admin.profile') }}" class="text-muted d-flex align-items-center py-2 px-3 rounded-3 hover-bg-light transition-all">
                        <i class="fas fa-user-cog me-2 m-2"></i> Profile Settings</a>
                </li>
                <li><a href="#" class="text-muted d-flex align-items-center py-2 px-3 rounded-3 hover-bg-light transition-all">
                        <i class="fas fa-shield-alt me-2 m-2"></i> Privacy Settings</a>
                </li>
                <li><a href="{{ route('admin.logout') }}" class="text-muted d-flex align-items-center py-2 px-3 rounded-3 hover-bg-light transition-all">
                        <i class="fas fa-sign-out-alt me-2 m-2"></i> Logout</a>
                </li>
            </ul>


            <!-- Language Selection -->
{{--            <div class="mt-3">--}}
{{--                <h6>Language</h6>--}}
{{--                <select class="form-control form-control-sm" id="languageSelect">--}}
{{--                    <option value="en">English</option>--}}
{{--                    <option value="es">Spanish</option>--}}
{{--                    <option value="fr">French</option>--}}
{{--                </select>--}}
{{--            </div>--}}

            <!-- Close Button -->
            <div class="mt-3">
                <button class="btn btn-danger btn-sm w-100" id="closeSidebar" data-widget="control-sidebar" data-controlsidebar-slide="true">Close</button>
            </div>
        </div>
    </aside>

    <script>
        if(localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
            document.getElementById('darkModeToggle').checked = true;
        } else {
            document.body.classList.remove('dark-mode');
            document.getElementById('darkModeToggle').checked = false;
        }
        document.getElementById('darkModeToggle').addEventListener('change', function() {
            if(this.checked) {
                document.body.classList.add('dark-mode');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('darkMode', 'disabled');
            }
        });
        document.getElementById('closeSidebar').addEventListener('click', function() {
            $('.control-sidebar').removeClass('control-sidebar-open');
        });
    </script>


    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@yield('script')
@stack('script')
@if(session()->has('success'))
    <script type="text/javascript">  toastr.success('{{ session('success')}}');</script>
@endif
@if(session()->has('error'))
    <script type="text/javascript"> toastr.error('{{ session('error')}}');</script>
@endif
</body>
</html>
