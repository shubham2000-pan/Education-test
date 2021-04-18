<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.user.header')
    @yield('internal_css') 
  </head>
<body>

 @include('layout.user.navbar')
   
  @yield('content')
  
  

  @include('layout.user.footer')
</body>
</html>
