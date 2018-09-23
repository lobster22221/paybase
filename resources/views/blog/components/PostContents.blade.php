<div class="blog-post">
            <h2 class="blog-post-title">{{$post['post_title']}}</h2>
            <p class="blog-post-meta">{{
                \Carbon\Carbon::parse($post['created_at'])->format('F d , Y')
                }}
                
                  
                by <a href="#">
                    {{
                   $post->user()->name
                    }}</a></p>
            {!!$post['post_content']!!}

            
          </div><!-- /.blog-post -->