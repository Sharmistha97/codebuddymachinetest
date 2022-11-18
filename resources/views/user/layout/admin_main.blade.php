<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('user.partial.header')
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
          
            <!-- Content -->
            @yield('content')
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
    </div>
    <!-- / Content -->

    @include('user.partial.footer')

</body>

</html>
