@extends('blog.layouts.layout')

@section('title')
Blog
@endsection
@section('content')
@include('blog.components.PostContents',array('post' => $post, 'users' => $user))

@endsection