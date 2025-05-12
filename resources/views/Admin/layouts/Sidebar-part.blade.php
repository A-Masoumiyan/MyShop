<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories ps" id="accordionExample">
            <li class="menu">
                <a href="#starter-kit" data-active="{{ request()->is('admin/dashboard*') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>داشبورد</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse {{ request()->is('admin/dashboard*') ? 'show' : '' }}" id="starter-kit" data-parent="#accordionExample" style="">
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{route('admin.dashboard')}}"> پروفایل </a>
                    </li>
                    <li class="{{ request()->is('admin/dashboard/profile') ? 'active' : '' }}">
                        <a href="{{route('profile.edit')}}"> حریم خصوصی </a>
                    </li>
                </ul>
            </li>
            @role('admin')
            <li class="menu">
                <a href="#submenu" data-active="{{ request()->is('admin/roles*') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-terminal">
                            <polyline points="4 17 10 11 4 5"></polyline>
                            <line x1="12" y1="19" x2="20" y2="19"></line>
                        </svg>
                        <span>مدیریت نقش ها</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('admin/roles*') ? 'show' : '' }}" id="submenu" data-parent="#accordionExample">
                    <li class="{{ request()->is('admin/roles') ? 'active' : '' }}">
                        <a href="{{route('admin.roles.index')}}">گروه کاربران </a>
                    </li>
                    <li class="{{ request()->is('admin/roles/users') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.list') }}"> افزودن نقش به کاربران </a>

                    </li>
                    <li class="{{ request()->is('admin/roles/manage') ? 'active' : '' }}">
                        <a href="{{ route('admin.roles.manage') }}"> مدیریت نقش ها </a>
                    </li>

                </ul>
            </li>
            @endrole
        </ul>

    </nav>

</div>
