<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login Boxed | CORK الگوی مدیریتی تمام ریسپانسیو </title>
    <link rel="icon" type="image/x-icon" href="{{asset('AdminAssets/assets/img/favicon.ico')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('AdminAssets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('AdminAssets/assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('AdminAssets/assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/assets/css/forms/switches.css')}}">
</head>
<body class="form">


<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1>ورودی</h1>
                    <p style="color: #009688">برای ادامه به حساب کاربری خود وارد شوید</p>

                    <form class="text-left" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form">

                            <div id="identifier" class="field-wrapper input">
                                <label for="identifier">نام کاربری / ایمیل</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input id="identifier" name="identifier" type="text" class="form-control" placeholder="نام کاربری / ایمیل" value="{{ old('identifier') }}">
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">رمزعبور</label>
                                    <a href="{{route('password.email')}}" class="forgot-pass-link">رمز عبور را فراموش کرده اید؟</a>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password" name="password" type="password" class="form-control" placeholder="رمزعبور">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">ورود</button>
                                </div>
                            </div>

                            <div class="field-wrapper terms_condition text-lg-center mt-3 mb-1">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" class="new-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="new-control-indicator"></span><span>مرا به خاطر بسپار</span>
                                    </label>
                                </div>
                                @error('terms')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <p class="signup-link mt-4">حساب ندارید؟ <a href="{{ route('register') }}"> یک حساب کاربری ایجاد کنید</a></p>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('AdminAssets/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('AdminAssets/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('AdminAssets/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('AdminAssets/assets/js/authentication/form-2.js')}}"></script>


</body>
</html>
