@extends('Layout')@section('content')
<div class="container">    
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-12">
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
     <tr>
        <td>total</td>        
        <td><?php 
           echo '$' . number_format($total, 2, '.', ',');
             ?>
        </td>
    </tr>  
    </table>
        
        Tip graph
        <br>
        <canvas id="myChart" width="400" height="400"></canvas>
        <script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            @foreach ($wage as $pay)
                        '{{ \Carbon\Carbon::parse($pay['date'])->format('F d , Y')}}' ,
                        @endforeach
        ],
        datasets: [{
            label: 'Tips earned over time',
            data: [
                        @foreach ($wage as $pay)
                        {{$pay['tip']}},
                        @endforeach
                        
                    ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
               
            ],
            borderColor: [
                'rgba(0,0,0,1)',
               
            ],
            borderWidth: 1.5
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:false,
                     callback: function(value, index, values) {
                        return '$' + value}                    
                }
            }]
               
        }
    }
});
</script>
        
        
        
    <table  class="table table-striped">
        <thead>
    <tr>

        <th>date</th>
        <th>wage</th>
        <th>hours</th>
        <th>tip</th>
            
    </tr>
    </thead>
    <tbody>
     @foreach ($wage as $pay)
    <tr>
      
      <td>{{ \Carbon\Carbon::parse($pay['date'])->format('l, d F, Y')}}</td>
      
      <td>$ {{ number_format($pay['rate'],2, '.', '.')}}</td>
      
      <td>{{ number_format($pay['hours'],2, '.', '.')}} hrs </td>
      
      <td>$ {{ number_format($pay['tip'],2, '.', '.')}}</td>
      
      
    </tr>  
     @endforeach
    </tbody>
    </table>
        
        </div>
    <div class="col-sm"></div>
    
    </div>
@endsection


        
        
        
        
       
        
       
 
