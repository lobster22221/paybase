<!doctype html>
<html lang="en">  
<head>
  @include('blog.components.header')
  @yield ('css')
</head>
  <body>    
@include('components.Navbar')
    <div class="container-fluid">
      <div class="row">
        @include('admin.components.adminsidebar')       
        @yield('content')
          
          
      </div>
    </div>

    @include('admin.components.footerscripts')
  </body>
</html>