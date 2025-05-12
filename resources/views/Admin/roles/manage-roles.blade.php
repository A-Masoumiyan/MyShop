@extends('Admin.layouts.Master')

@section('content')
    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>ایجاد نقش</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
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

                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">نام نقش</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="نام یا عنوان نقش" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4 mb-3" style="margin-right: 12%">
                        @if(isset($permissions) && $permissions->isNotEmpty())
                            @foreach($permissions as $permission)
                                @if($loop->index % 3 == 0)
                                    <div class="row">
                                        @endif

                                        <div class="col-md-4 col-4">
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-primary new-checkbox-text">
                                                    <input type="checkbox" class="new-control-input" name="permissions[]" value="{{ $permission->name }}" id="perm-{{ $permission->id }}">
                                                    <span class="new-control-indicator"></span>
                                                    <span class="new-chk-content">{{ $permission->name }}</span>
                                                </label>
                                            </div>
                                        </div>

                                        @if($loop->index % 3 == 2 || $loop->last)
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p class="text-muted">هیچ پرمیژنی موجود نیست.</p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">ایجاد نقش</button>
                </form>
            </div>
        </div>
    </div>

    <div id="existingRoles" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>نقش‌های موجود</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                @if($roles->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>نقش</th>
                            <th>پرمیژن‌ها</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td style="width: 20%">{{ $role->name }}</td>
                                <td style="width: 65%">
                                    @if($role->permissions->isNotEmpty())
                                        @foreach($role->permissions as $permission)
                                            <span class="badge badge-info mr-1">{{ $permission->name }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">بدون پرمیژن</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPermissionsModal-{{ $role->id }}">ویرایش</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteRoleModal-{{ $role->id }}">حذف</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">هیچ نقشی موجود نیست.</p>
                @endif
            </div>
        </div>
    </div>

    @foreach($roles as $role)
        <div class="modal fade" id="editPermissionsModal-{{ $role->id }}" tabindex="-1" aria-labelledby="editPermissionsModalLabel-{{ $role->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPermissionsModalLabel-{{ $role->id }}">ویرایش پرمیژن‌های نقش: {{ $role->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.roles.update-permissions', $role->id) }}">
                            @csrf
                            @method('PUT')
                            <p>پرمیژن‌های موردنظر برای نقش را انتخاب کنید:</p>
                            <div class="form-group mb-4">
                                @if($permissions->isNotEmpty())
                                    @foreach($permissions as $permission)
                                        <div class="n-chk">
                                            <label class="new-control new-checkbox checkbox-primary new-checkbox-text">
                                                <input type="checkbox" class="new-control-input" name="permissions[]" value="{{ $permission->name }}"
                                                       id="edit-perm-{{ $role->id }}-{{ $permission->id }}"
                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                <span class="new-control-indicator"></span>
                                                <span class="new-chk-content">{{ $permission->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">هیچ پرمیژنی موجود نیست.</p>
                                @endif
                                @error('permissions')
                                <script>
                                    Toastify({
                                        text: "{{ $message }}",
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
                                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">لغو</button>
                                <button type="submit" class="btn btn-primary">به‌روزرسانی پرمیژن‌ها</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($roles as $role)
        <div class="modal fade" id="deleteRoleModal-{{ $role->id }}" tabindex="-1" aria-labelledby="deleteRoleModalLabel-{{ $role->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteRoleModalLabel-{{ $role->id }}">تأیید حذف نقش: {{ $role->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
                            @csrf
                            @method('DELETE')
                            <p>آیا مطمئن هستید که می‌خواهید نقش "{{ $role->name }}" را حذف کنید؟ این اقدام غیرقابل بازگشت است.</p>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">لغو</button>
                                <button type="submit" class="btn btn-danger">حذف نقش</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
