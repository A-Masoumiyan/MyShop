<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories ps" id="accordionExample">
            <li class="menu">
                <a href="#dashboardMenu" data-active="{{ request()->is('admin/dashboard*') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>داشبورد</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse {{ request()->is('admin/dashboard*') ? 'show' : '' }}" id="dashboardMenu" data-parent="#accordionExample">
                    <li class="{{ request()->is('admin/dashboard/profile') ? 'active' : '' }}">
                        <a href="{{route('admin.profile')}}"> پروفایل </a>
                    </li>
                    <li class="{{ request()->is('admin/dashboard/profile/edit') ? 'active' : '' }}">
                        <a href="{{route('profile.edit')}}"> حریم خصوصی </a>
                    </li>
                </ul>
            </li>

            @can('create-super-user')
                <li class="menu">
                    <a href="#rolesMenu" data-active="{{ request()->is('admin/roles*') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-terminal">
                                <polyline points="4 17 10 11 4 5"></polyline>
                                <line x1="12" y1="19" x2="20" y2="19"></line>
                            </svg>
                            <span> نقش ها</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ request()->is('admin/roles*') ? 'show' : '' }}" id="rolesMenu" data-parent="#accordionExample">
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
            @endcan

            @can('create-category')
                <li class="menu">
                    <a href="#categoryMenu" data-active="{{ request()->is('admin/category*') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                            <span>دسته بندی</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ request()->is('admin/category*') ? 'show' : '' }}" id="categoryMenu" data-parent="#accordionExample">
                        <li class="{{ request()->is('admin/category') ? 'active' : '' }}">
                            <a href="{{route('category.index')}}"> دسته بندی ها</a>
                        </li>
                        <li class="{{ request()->is('admin/category/create') ? 'active' : '' }}">
                            <a href="{{route('category.create')}}">ایجاد دسته بندی</a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('create-product')
                <li class="menu">
                    <a href="#productMenu" data-active="{{ request()->is('admin/product*') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-box">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span>محصولات</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ request()->is('admin/product*') ? 'show' : '' }}" id="productMenu" data-parent="#accordionExample">
                        <li class="{{ request()->is('admin/product') ? 'active' : '' }}">
                            <a href="{{route('product.index')}}">لیست محصولات</a>
                        </li>
                        <li class="{{ request()->is('admin/product/create') ? 'active' : '' }}">
                            <a href="{{route('product.create')}}">ثبت محصول</a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </nav>
</div>
