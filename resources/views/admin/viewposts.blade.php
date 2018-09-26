@extends('admin.layout.layout')
@section('css')
 <link href="/css/admin.css" rel="stylesheet">
@endsection

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>          
          </div>
    
    <table class="table table-dark">
  <thead>
    <tr>
      <th>Title</th>
      <th>edit</th>
      <th>Delete</th>
      <th>Updated at</th>
      <th>Series</th>
      <th>Tags</th>
      <th>Categories</th>
      
    </tr>
  </thead>
  <tbody>    
        @foreach ($posts as $post)
        <tr>
        <td>{{$post['post_title']}}</td>    
        <td><a href="/admin/editPost/{{$post['id']}}">edit</a></td>
        <td><a href="/admin/deletePost/{{$post['id']}}">delete</a></td>
        <td>{{$post['updated_at']}}</td>
        <td>NYI series</td>
        <td>NYI tags</td>
        <td>NYI categories</td>
        </tr>
        @endforeach 
  </tbody>
  
</table>

</main>

@endsection