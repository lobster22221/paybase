<aside class="col-md-4 blog-sidebar">
          <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            @foreach ($archives as $stat)
               
                <li>                    
                    <a href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}">{{$stat['month']}} {{$stat['year']}}</a>
                </li>
            @endforeach
          </div>

          <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="https://github.com/lobster22221/paybase">GitHub</a></li>
              <li><a href='mailto:amichaelmillerAlaska@gmail.com'>Email</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->