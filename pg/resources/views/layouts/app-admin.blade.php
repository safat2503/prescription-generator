<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include ('layouts.site-css')
  @include ('layouts.site-js')
  </head>

    <body class="hold-transition skin-blue sidebar-mini">
       <div class="wrapper">

      @include('layouts.top-bar')

      @include('layouts.sidebar')

      

      @yield('content')
      

      @include('layouts.footer')

      
      
  



    
    </body>
</html>
