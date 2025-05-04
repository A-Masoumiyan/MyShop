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
                    <h1 class="">ثبت نام</h1>
                    <p class="signup-link register">حساب دارید؟ <a href="{{ route('login') }}">وارد شوید</a></p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form">
                            <div id="firstname-field" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="firstname">نام</label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input id="firstname" name="firstname" type="text" class="form-control" placeholder="نام" value="{{ old('firstname') }}">
                                @error('firstname')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="lastname-field" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="lastname">نام خانوادگی</label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input id="lastname" name="lastname" type="text" class="form-control" placeholder="نام خانوادگی" value="{{ old('lastname') }}">
                                @error('lastname')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="username-field" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="username">نام کاربری</label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input id="username" name="username" type="text" class="form-control" placeholder="نام کاربری" value="{{ old('username') }}">
                                @error('username')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="email-field" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="email">ایمیل</label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-at-sign register">
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                </svg>
                                <input id="email" name="email" type="text" class="form-control" placeholder="ایمیل" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">رمزعبور</label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password" name="password" type="password" class="form-control" placeholder="رمزعبور" required autocomplete="new-password">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                @error('password')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div id="password-confirmation-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password_confirmation">تأیید رمزعبور</label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="تأیید رمزعبور" required autocomplete="new-password">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" id="toggle-password-confirmation" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                @error('password_confirmation')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-wrapper terms_condition">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" class="new-control-input" name="terms" {{ old('terms') ? 'checked' : '' }}>
                                        <span class="new-control-indicator"></span><span>من موافقم با <a href="javascript:void(0);"> شرایط و ضوابط </a></span>
                                    </label>
                                </div>
                                @error('terms')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-sm-flex justify-content-between mb-5">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">ثبت نام</button>
                                </div>
                            </div>
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
