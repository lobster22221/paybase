
<!doctype html>
<html lang="en">
  @include('blog.Components.header')
  <body>
    <div class="container">
        <div class="nav-scroller py-1 mb-2">
        @include('Components.navbar')
      </div>      
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            @yield('title')
          </h3>
            @yield('content')

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>
        </div><!-- /.blog-main -->

         @include('blog.components.Sidebar') 

      </div><!-- /.row -->

    </main><!-- /.container -->

    @include('blog.components.footer') 

   
  </body>
</html>
