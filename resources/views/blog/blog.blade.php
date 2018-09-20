@extends('blog.layouts.layout')

@section('title')
Blog
@endsection
@section('content')
@foreach ($posts as $post)

@include('blog.components.PostContents',array('post' => $post))

@endforeach 

@endsection