<!DOCTYPE html>
<html>
<head>
    <title>مدیریت نقش‌های پویا</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        .success { color: green; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
<h1>مدیریت نقش‌ها و دسترسی‌ها</h1>

@if (session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

<!-- فرم ایجاد نقش -->
<h3>ایجاد نقش جدید</h3>
<form action="{{ route('admin.roles.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>نام نقش:</label>
        <input type="text" name="name" required>
    </div>
    <div class="form-group">
        <label>مجوزها:</label>
        @foreach ($permissions as $permission)
            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"> {{ $permission->name }}
        @endforeach
    </div>
    <button type="submit">ساخت نقش</button>
</form>

<!-- فرم ایجاد مجوز -->
<h3>ایجاد مجوز جدید</h3>
<form action="{{ route('admin.permissions.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>نام مجوز:</label>
        <input type="text" name="name" required>
    </div>
    <button type="submit">ساخت مجوز</button>
</form>

<!-- فرم اختصاص نقش به کاربرها -->
<h3>اختصاص نقش به کاربرها</h3>
<form action="{{ route('admin.roles.assign') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>کاربرها:</label>
        <select name="user_ids[]" multiple required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->firstname }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>نقش:</label>
        <select name="role" required>
            @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">اختصاص نقش</button>
</form>

<!-- جدول نقش‌ها -->
<h3>نقش‌های موجود</h3>
<table>
    <tr>
        <th>نام نقش</th>
        <th>مجوزها</th>
        <th>کاربرها</th>
        <th>عملیات</th>
    </tr>
    @foreach ($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ implode(', ', $role->permissions->pluck('name')->toArray()) }}</td>
            <td>{{ implode(', ', $role->users->pluck('firstname')->toArray()) }}</td>
            <td>
                <!-- فرم ویرایش نقش -->
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $role->name }}" required>
                    @foreach ($permissions as $permission)
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                        {{ $permission->name }}
                    @endforeach
                    <button type="submit">ویرایش</button>
                </form>
                <!-- فرم حذف نقش -->
                <form action="{{ route('admin.roles.delete', $role->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('مطمئن هستید؟')">حذف</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
