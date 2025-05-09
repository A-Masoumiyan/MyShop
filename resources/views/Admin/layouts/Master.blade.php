<!DOCTYPE html>
<html lang="en">
@include('Admin.layouts.head-tag')
<body>
@include('Admin.layouts.Navbar-part')
@include('Admin.layouts.Navbar-part-tow')
@include('Admin.layouts.Toastify')

<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    @include('Admin.layouts.Sidebar-part')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            @yield("content")

        </div>

        @include('Admin.layouts.footer-tag')

    </div>

</div>

@include('Admin.layouts.js')

</body>
</html>
