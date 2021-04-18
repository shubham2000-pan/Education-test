<!doctype html>
<html lang="en">

<head>
   @include('layout.website.header')
   
    @yield('internal_css') 
   
</head>

<body>

  @include('layout.website.navbar')
   
  @yield('content')

  @include('layout.website.footer')  
  @yield('footer_script')
    
</body>

</html>
