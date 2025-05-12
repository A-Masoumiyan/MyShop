@extends('Admin.layouts.Master')

@section('content')
    <div id="userList" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>لیست کاربران</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <!-- پیام‌های موفقیت و خطا -->
                @if (session('success'))
                    <script>
                        Toastify({
                            text: "{{ session('success') }}",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            style: {
                                background: "#28a745",
                                borderRadius: "8px",
                                fontFamily: "Vazir, sans-serif"
                            },
                            stopOnFocus: true
                        }).showToast();
                    </script>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <script>
                            Toastify({
                                text: "{{ $error }}",
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
                    @endforeach
                @endif

                <!-- فرم جستجو -->
                <form action="{{ route('admin.users.list') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="جستجو بر اساس :    نام  ,  نام خانوادگی  ,  نام کاربری  ,  ایمیل" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit">جستجو</button>
                        </div>
                    </div>
                </form>

                <!-- جدول کاربران -->
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>نام کاربر</th>
                        <th>ایمیل</th>
                        <th>نقش فعلی</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->roles->isNotEmpty())
                                    {{ $user->roles->pluck('name')->implode(', ') }}
                                @else
                                    <span class="text-muted">بدون نقش</span>
                                @endif
                            </td>
                            <td style="width: 12%">
                                <a style="font-size: small" href="{{ route('admin.users.edit-roles', $user->id) }}" class="btn btn-warning btn-sm">تغییر نقش</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">هیچ کاربری یافت نشد.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
