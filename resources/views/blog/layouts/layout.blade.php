
<!doctype html>
<html lang="en">
    <head>
  @include('blog.components.header')
  </head>
  <body>
    <div class="container-fluid">
        <div class="nav-scroller py-1 mb-2">
        @include('components.Navbar')      </div>      
    </div>

    <main role="main" class="container-fluid">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            @yield('title')
          </h3>
            @yield('content')

          
        </div><!-- /.blog-main -->

         @include('blog.components.Sidebar') 

      </div><!-- /.row -->

    </main><!-- /.container -->

    @include('blog.components.footer') 

   
  </body>
</html>
