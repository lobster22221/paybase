@extends('blog.layouts.layout')

@section('title')
Blog
@endsection
@section('content')
@foreach ($posts as $post)

@include('blog.components.PostContents',array('post' => $post))

@endforeach 

<nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

@endsection