<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | User</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/fontawesome/css/fontawesome-6-1-1.min.css')}}">
<!-- <link rel="stylesheet" href="{{asset('admin-assets/fontawesome-free/css/all.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">

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
    <script src="{{asset('admin-assets/js/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/toastr.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/select2.min.js')}}"></script>
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
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    @include('user.includes.navbar')
    @include('user.includes.sidebar')


    @yield('content')

    <footer class="main-footer text-center">
        <strong>Copyright &copy; 2021-2022 <a href="/">User.com</a>.</strong>
        All rights reserved.

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@yield('script')
@if(session()->has('success'))
    <script type="text/javascript">  toastr.success('{{ session('success')}}');</script>
@endif
@if(session()->has('error'))
    <script type="text/javascript"> toastr.error('{{ session('error')}}');</script>
@endif
</body>
</html>
