@extends('layouts.front-admin-layout')
@section('title') Admin Login @endsection
@section('content')

    <style>
        body {
            background: linear-gradient(135deg, #000000, #2980b9);
            font-family: 'Arial', sans-serif;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container-fluid {
            max-width: 450px;
            background: #1c1c1c;
            padding: 30px;
            margin-top:200px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
            animation: fadeIn 1.2s ease-out;
        }

        .login-img img {
            width: 150px;
            animation: bounce 1s infinite alternate;
        }

        .login-logo h2 {
            font-weight: bold;
            color: 2980b9;
            margin-top: 10px;
        }

        .card-box-shadow {
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
        }

        .card-body h4 {
            color: 2980b9;
        }

        .form__field {
            background: #333;
            color: #fff;
            border: 1px solid 2980b9;
            border-radius: 5px;
            padding: 10px;
            transition: transform 0.3s ease;
        }

        .form__field:focus {
            border: 1px solid #2980b9;
            transform: scale(1.03);
            outline: none;
        }

        .btn-primary {
            background: 2980b9;
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: bold;
            margin-top: 10px;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background: #ffffff;
            color: #000000;
            transform: translateY(-3px);
        }

        .alert {
            font-size: 14px;
            animation: fadeSlide 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(-10px);
            }
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="container-fluid">
        <div class="text-center">
            <a href="{{ route('index') }}">
                <div class="login-img">
                    <img src="{{ isset($setting) ? $setting->settingImage('header_logo') : asset('front/images/logo.png') }}" alt="Logo">
                </div>
                <div class="login-logo">
                    <h2>{{ $setting->site_title ?? 'Admin Panel' }}</h2>
                </div>
            </a>
        </div>

        <div class="card card-box-shadow">
            <div class="card-body">
                <h4 class="text-center">Admin Login</h4>
                @if(Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if(Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show text-center">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control form__field" name="email" placeholder="Enter Your Email">
                        <small class="text-danger">@error('email') {{ $message }} @enderror</small>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form__field" name="password" placeholder="Enter Your Password">
                        <small class="text-danger">@error('password') {{ $message }} @enderror</small>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="" class="btn btn-primary">Reset Password Link</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Simple script to enhance focus animations
        document.querySelectorAll('.form__field').forEach(field => {
            field.addEventListener('focus', () => field.classList.add('focused'));
            field.addEventListener('blur', () => field.classList.remove('focused'));
        });
    </script>

@endsection
