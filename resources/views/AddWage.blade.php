@extends('Layout')

@section('content')
<form method="POST" action="/addcreate">
{!! csrf_field() !!}
<div class="form-group">
    <label for="formDate">Date</label>
    <input type="date" class="form-control" id="formDate" name="date">
</div>
<div class="form-group">
    <label for="formWage">Wage</label>
    <input type="number" class="form-control" data-number-to-fixed="2" id="formWage" name="wage" value="0">
</div>
<div class="form-group">
    <label for="formTip">Tip</label>
    <input type="number" class="form-control" data-number-to-fixed="2" id="formTip" name="tip" value="0">
</div> 
<div class="form-group">
    <label for="formHours">Hours</label>
    <input type="number" class="form-control" id="formHours" name="hours" value="0">
</div> 
<div class="form-group">
    <label for="formEmployer">Employer</label>
    <input type="text" class="form-control" id="formEmployer" name="employer">   
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection


        
        
        
        
       
        
       
 
