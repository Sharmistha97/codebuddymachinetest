<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    @include('user.partial.auth.header')
  </head>

  <body>
    <!-- Content -->
   @yield('content')
    

    <!-- / Content -->

  	@include('user.partial.auth.footer')
  </body>
</html>
