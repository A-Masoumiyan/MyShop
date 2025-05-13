@extends('Admin.layouts.Master')
@section('content')
    <div class="col-lg-12 layout-spacing mt-4">
        <div class="statbox widget box box-shadow">

            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                    @csrf
                                </form>

                                <form id="general-info" class="section general-info" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                    <div class="info">
                                        <h5>ویرایش اطلاعات</h5>
                                        <p style="color: #009688 " class="mb-3">برای ویرایش محتوای هر یک از فیلدهای زیر را تغییر دهید.</p>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row mb-4">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4">

                                                            <input type="file" name="profile_image" id="input-file-max-fs" class="dropify" data-default-file="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('AdminAssets/assets/img/user-default.png') }}" data-max-file-size="4M"/>
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> آپلود عکس</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="col">
                                                                        <label for="firstname" class="form-label">نام</label>
                                                                        <input id="firstname" name="firstname" type="text" class="form-control" placeholder="نام"
                                                                               value="{{ old('firstname', $user->firstname) }}" required autofocus
                                                                               autocomplete="given-name">
                                                                        @error('firstname')
                                                                        <span class="text-danger text-sm">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="col">
                                                                        <label for="lastname" class="form-label">نام خانوادگی</label>
                                                                        <input id="lastname" name="lastname" type="text" class="form-control" placeholder="نام خانوادگی"
                                                                               value="{{ old('lastname', $user->lastname) }}" required
                                                                               autocomplete="family-name">
                                                                        @error('lastname')
                                                                        <span class="text-danger text-sm">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-4">
                                                                <div class="col">
                                                                    <label for="email" class="form-label">ایمیل</label>
                                                                    <input id="email" name="email" type="email" class="form-control" placeholder="ایمیل" value="{{ old('email', $user->email) }}"
                                                                           required autocomplete="username">
                                                                    @error('email')
                                                                    <span class="text-danger text-sm">{{ $message }}</span>
                                                                    @enderror

                                                                    <!-- نمایش وضعیت تأیید ایمیل -->
                                                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                                                        <div class="mt-2">
                                                                            <p class="text-sm text-gray-800">
                                                                                ایمیل شما تأیید نشده است.
                                                                                <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline text-sm text-gray-600 hover:text-gray-900">
                                                                                    برای ارسال مجدد لینک تأیید کلیک کنید.
                                                                                </button>
                                                                            </p>
                                                                            @if (session('status') === 'verification-link-sent')
                                                                                <p class="mt-2 font-medium text-sm text-green-600">
                                                                                    لینک تأیید جدیدی به ایمیل شما ارسال شد.
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <button type="submit" class="btn btn-primary">ثبت</button>
                                            @if (session('status') === 'profile-updated')
                                                <script>
                                                    Toastify({
                                                        text: "با موفقیت ثبت شد",
                                                        position: "left",
                                                        duration: 6000,
                                                        className: "custom-toast",
                                                    }).showToast();
                                                </script>
                                            @endif
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="flLoginForm" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>تغییر رمز ورود</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="form-group mb-4">
                        <label for="update_password_current_password" class="form-label">رمز عبور فعلی *</label>
                        <input type="text" class="form-control" id="update_password_current_password" name="current_password" placeholder="رمز عبور فعلی خود را وارد کنید "
                               autocomplete="current-password">
                        @error('current_password', 'updatePassword')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="update_password_password" class="form-label">رمز عبور جدید *</label>
                        <input type="text" class="form-control" id="update_password_password" name="password" placeholder="رمز عبور جدید را وارد کنید" autocomplete="new-password">
                        @error('password', 'updatePassword')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="update_password_password_confirmation" class="form-label">تأیید رمز عبور جدید *</label>
                        <input type="text" class="form-control" id="update_password_password_confirmation" name="password_confirmation" placeholder="رمز عبور جدید را وارد کنید"
                               autocomplete="new-password">
                        @error('password_confirmation', 'updatePassword')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-primary mt-4">ذخیره</button>
                        @if (session('status') === 'password-updated')
                            <script>
                                Toastify({
                                    text: "رمز عبور با موفقیت تغییر کرد",
                                    position: "left",
                                    duration: 6000,
                                    className: "custom-toast",
                                }).showToast();
                            </script>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>حذف حساب کاربری</h4>
                        <p style="color: #009688">پس از حذف حساب، تمام داده‌ها و منابع مرتبط با آن به‌صورت دائمی حذف خواهند شد. لطفاً قبل از حذف، هر داده‌ای که می‌خواهید نگه دارید را دانلود کنید.</p>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <!-- دکمه باز کردن پاپ‌آپ -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletion">
                    حذف حساب
                </button>

                <!-- نوتفیکیشن موفقیت -->
                @if (session('status') === 'account-deleted')
                    <script>
                        Toastify({
                            text: "حساب کاربری شما با موفقیت حذف شد",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            style: {
                                background: "#dc3545",
                                borderRadius: "8px",
                                fontFamily: "Vazir, sans-serif"
                            },
                            stopOnFocus: true
                        }).showToast();
                    </script>
                @endif
            </div>
        </div>
    </div>

    <!-- پاپ‌آپ تأیید حذف حساب -->
    <div class="modal fade" id="confirmUserDeletion" tabindex="-1" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmUserDeletionLabel">تأیید حذف حساب</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <p>آیا مطمئن هستید که می‌خواهید حساب کاربری خود را حذف کنید؟ این اقدام غیرقابل بازگشت است و تمام داده‌های شما برای همیشه حذف خواهد شد.</p>

                        <div class="form-group mb-4">
                            <label for="password" class="form-label">رمز عبور *</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="رمز عبور" required>
                            @error('password', 'userDeletion')
                            <script>
                                Toastify({
                                    text: "رمز عبور صحیح نیست !",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    style: {
                                        background: "#dc3545",
                                        borderRadius: "8px",
                                        fontFamily: "Vazir, sans-serif"
                                    },
                                    stopOnFocus: true
                                }).showToast();
                            </script>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-success me-2" data-bs-dismiss="modal">لغو</button>
                            <button type="submit" class="btn btn-danger">حذف حساب</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
