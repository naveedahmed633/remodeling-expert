<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')| Admin</title>
    <link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
    <script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/adminlte.js')}}"></script>
    <script src="{{asset('admin-assets/js/bootstrap.js')}}"></script>
</head>
<style>
    .card-box-shadow {
        box-shadow: rgba(61, 55, 238, 0.15) 0px 2px 6px 5px;
    !important;
    }
    .form__field {
        background: #fff;
        font: inherit;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 10px 2px;
        border: 0;
        outline: 0;
        border-radius: 20px;
        padding: 25px;
        position: relative;
    }

    input[type=text]:focus,
    input[type=file]:focus,
    input[type=number]:focus,
    input[type=password]:focus,
    input[type=email]:focus,
    textarea:focus {
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 10px 2px;
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
        -webkit-box-shadow:  rgba(0, 0, 0, 0.1) 0px 1px 10px 2px !important;
        transition: background-color 4000s ease-in-out 0s;
    }



</style>
<body class="hold-transition sidebar-mini layout-fixed">

@yield('content')



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
