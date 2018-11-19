<div class="blog-post">
    <a href="/blog/{{$post->id}}"><h2 class="blog-post-title">{{$post['post_title']}}</h2></a>
            <p class="blog-post-meta">{{
                \Carbon\Carbon::parse($post['created_at'])->format('F d , Y')
                }}
                
                  
                by <a href="#">
                    {{
                   $post->user()->name
                    }}</a></p>
            {!!$post['post_content']!!}

            
</div><!-- /.blog-post -->
tags:
<div class="blog-tags">
    @foreach($post->tags as $tag)
    <a href ="/tag/{{$tag->description}}">{{$tag->description}}</a>
    @if (!$loop->last) , @endif
    
    
    @endforeach
   
</div>