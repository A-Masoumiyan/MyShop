<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories ps" id="accordionExample">
            <li class="menu">
                <a href="#starter-kit" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                        <span>داشبورد</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse show" id="starter-kit" data-parent="#accordionExample" style="">
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{route('admin.dashboard')}}"> پروفایل </a>
                    </li>
                    <li class="{{ request()->is('profile') ? 'active' : '' }}">
                        <a href="{{route('profile.edit')}}"> حریم خصوصی </a>
                    </li>
                    <li>
                        <a href="starter_kit_boxed.html"> جعبه </a>
                    </li>
                    <li>
                        <a href="starter_kit_alt_menu.html"> منوی ترجیحی </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span> منو 1</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                        <span> منو 2</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu" data-parent="#accordionExample">
                    <li>
                        <a href="javascript:void(0);"> زیرمنو 1 </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> زیرمنو 2 </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span> منو 3</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
                    <li>
                        <a href="javascript:void(0);"> زیرمنو 1 </a>
                    </li>
                    <li>
                        <a href="#sm2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> زیرمنو 2 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="collapse list-unstyled sub-submenu" id="sm2" data-parent="#submenu2">
                            <li>
                                <a href="javascript:void(0);"> زیر زیرمنو 1 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> زیر زیرمنو 2 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> زیر زیرمنو 3 </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>

</div>
