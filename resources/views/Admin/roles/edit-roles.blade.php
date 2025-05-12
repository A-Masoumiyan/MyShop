@extends('Admin.layouts.Master')
@section('content')
    <div class="col-xl-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <form action="{{ route('admin.users.update-roles', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach ($roles as $role)
                        <div class="n-chk">
                            <label class="new-control new-radio radio-classic-success">
                                <input type="radio"
                                       class="new-control-input"
                                       name="role"
                                       value="{{ $role->name }}"
                                    {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                <span class="new-control-indicator"></span>
                                @switch($role->name)
                                    @case('admin')
                                        مدیر
                                        @break
                                    @case('user')
                                        کاربر
                                        @break
                                    @case('super-user')
                                        کاربر ویژه
                                        @break
                                    @default
                                        {{ $role->name }}
                                @endswitch
                            </label>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-success mt-3">ذخیره تغییرات</button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-danger mt-3">بازگشت</a>
                </form>
            </div>
        </div>
    </div>
@endsection
