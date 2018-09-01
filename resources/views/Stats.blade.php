@extends('Layout')@section('content')
<div class="container">    
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-lg">
        <h1>overall Stats</h1>   
        full table
        
             
    <table class="table table-dark">    
    <tr>
        <td>Average Tip</td>        
        <td><?php 
           echo '$' . number_format($tipavg, 2, '.', ',');
             ?></td>
    </tr>  
    <tr>
        <td>Highest Tip</td>        
        <td><?php 
           echo '$' . number_format($tipmax, 2, '.', ',');
             ?></td>
    </tr>  
    <tr>
        <td>Lowest Tip</td>        
        <td><?php 
           echo '$' . number_format($tipmin, 2, '.', ',');
             ?>
        </td>
    </tr>  
    <tr>
        <td>std dev</td>        
        <td><?php 
           echo '$' . number_format($std, 2, '.', ',');
             ?>
        </td>
    </tr>  
    </table>
        <br>
    <table  class="table table-striped">
        <thead>
    <tr>
        <th>id</th>
        <th>date</th>
        <th>wage</th>
        <th>hours</th>
        <th>tip</th>
        <th>employer</th>            
    </tr>
    </thead>
    <tbody>
     @foreach ($wage as $pay)
    <tr>
      <td>{{$pay['id']}}</td>
      <td>{{ \Carbon\Carbon::parse($pay['date'])->format('l, d F, Y')}}}</td>
      <td>{{$pay['wage']}}</td>
      <td>{{$pay['hours']}}</td>
      <td>{{$pay['tip']}}</td>
      <td>{{$pay['employer']}}</td>
    </tr>  
     @endforeach
    </tbody>
    </table>
        
        </div>
    <div class="col-sm"></div>
    
    </div>
@endsection


        
        
        
        
       
        
       
 
