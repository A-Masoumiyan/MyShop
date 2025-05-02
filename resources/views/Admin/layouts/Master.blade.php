<!DOCTYPE html>
<html lang="en">
@include('Admin.layouts.head-tag')
<body>
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
@include('Admin.layouts.Navbar-part')
@include('Admin.layouts.Navbar-part-tow')


<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    @include('Admin.layouts.Sidebar-part')

    <div id="content" class="main-content">

        @yield("content")

        @include('Admin.layouts.footer-tag')

    </div>

</div>

@include('Admin.layouts.js')

</body>
</html>
