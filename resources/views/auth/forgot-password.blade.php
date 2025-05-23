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
    <link href="{{asset('AdminAssets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('AdminAssets/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('AdminAssets/assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/assets/css/forms/switches.css')}}">
</head>
<body class="form no-image-content">

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">بازیابی رمزعبور</h1>
                        <p class="signup-link recovery mb-0" style="color: #009688">ایمیل خود را وارد کنید ، ایمیل تغییر رمز برای شما ارسال می شود</p>
                        <p class="signup-link recovery" style="color: #009688; font-size: medium">پوشه <span style="color: #007bff">spam</span> را برسی کنید!</p>
                        <form class="text-left" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">ایمیل</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="text" class="form-control" value="" placeholder="ایمیل">
                                </div>
                                @error('email')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror

                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">تنظیم مجدد</button>
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
