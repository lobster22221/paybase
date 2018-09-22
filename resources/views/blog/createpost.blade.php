@extends('blog.layouts.layout')

@section('content')
<form method="POST" action="/blog/storepost">
{!! csrf_field() !!}
<div class="form-group">
    <label for="formTitle">title</label>
    <input type="text" class="form-control" id="formTitle" name="title">
</div>
<div class="form-group">
    <label for="formPost">Content:</label>
    <textarea class="form-control" rows="5" id="formPost" name="content"></textarea>
</div>

 <input type="text" class="form-control" id="formDate" name="title">
  <input type="text" class="form-control" id="formDate" name="title">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection