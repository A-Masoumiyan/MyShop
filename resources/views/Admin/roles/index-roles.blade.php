@extends('Admin.layouts.Master')
@section('content')
    <div class="row" id="cancel-row">
        @foreach ($roles as $role)
            @if($role->name !== 'user')
                <div class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>
                                        @switch($role->name)
                                            @case('admin')
                                                مدیر
                                                @break
                                            @case('super-user')
                                                کاربر ویژه
                                                @break
                                        @endswitch
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">

                            <div class="parent ex-1">
                                <div class="row">

                                    @foreach($role->users as $role_user)
                                    <div class="col-sm-6">
                                        <div id="{{ $loop->odd ? 'right-defaults' : 'left-defaults' }}" class="dragula">
                                                <div class="media  d-md-flex d-block text-sm-left text-center">
                                                    <img alt="avatar" src="{{ $role_user->profile_image ? asset('storage/' . $role_user->profile_image) : asset('AdminAssets/assets/img/user-default.png') }}" class="img-fluid ">
                                                    <div class="media-body">
                                                        <div class="d-xl-flex d-block justify-content-between">
                                                            <div class="">
                                                                <h6 class="">{{$role_user->firstname}} {{$role_user->lastname}}</h6>
                                                            </div>
                                                            <div>
                                                                <a href="{{ route('admin.users.edit-roles', $role_user->id) }}">
                                                                    <button class="btn btn-primary btn-sm">ویرایش</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
@endsection
