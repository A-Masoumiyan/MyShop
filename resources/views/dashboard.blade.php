@extends('Admin.layouts.Master')
@section('content')
    <div class="row layout-spacing">

        <!-- Content -->
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">پروفایل</h3>
                        <a href="{{route('profile.edit')}}" class="mt-2 edit-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="text-center user-info">
                        <img src="{{asset('AdminAssets/assets/img/90x90.jpg')}}" alt="avatar">
                        <p>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                    </div>
                    <div class="user-info-list">
                        <div>
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-coffee">
                                        <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                        <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                        <line x1="6" y1="1" x2="6" y2="4"></line>
                                        <line x1="10" y1="1" x2="10" y2="4"></line>
                                        <line x1="14" y1="1" x2="14" y2="4"></line>
                                    </svg>
                                    @forelse(auth()->user()->getRoleNames() as $role)
                                        @switch($role)
                                            @case('admin')
                                                مدیر
                                                @break
                                            @case('user')
                                                کاربر عادی
                                                @break

                                            @case('super-user')
                                                کاربر ویژه
                                                @break
                                        @endswitch
                                    @empty
                                        سطح دسترسی نامشخص
                                    @endforelse


                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-calendar">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    {{Jdatename(auth()->user()->created_at).'  '}}
                                </li>
                                <li class="contacts-block__item">
                                    <a href="mailto:example@mail.com">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-mail">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        {{ auth()->user()->email}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="education layout-spacing ">
                <div class="widget-content widget-content-area">
                    <h3 class="">دسترسی ها</h3>
                    <div class="timeline-alter">
                        @forelse(auth()->user()->getAllPermissions()->pluck('name') as $permission)
                            @switch($permission)
                                @case('create-super-user')
                                    <div class="item-timeline">
                                        <div class="t-meta-date">
                                            <p class="">مدیر ارشد</p>
                                        </div>
                                        <div class="t-dot">
                                        </div>
                                        <div class="t-text">
                                            <p>مدیریت کل کاربران</p>
                                        </div>
                                    </div>
                                    @break

                            @endswitch
                        @empty
                            فاغد دسترسی
                        @endforelse

                    </div>
                </div>
            </div>

        </div>


    </div>

@endsection
