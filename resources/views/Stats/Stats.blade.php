@extends('Layout')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-12">
        <h1>Overall Stats</h1>  
    <table class="table table-dark">    
    <tr>
        <td>Average tip</td>        
        <td><?php 
           echo '$' . number_format($tipavg, 2, '.', ',');
             ?></td>
    </tr>  
    <tr>
        <td>Highest tip</td>        
        <td><?php 
           echo '$' . number_format($tipmax, 2, '.', ',');
             ?></td>
    </tr>  
    <tr>
        <td>Lowest tip</td>        
        <td><?php 
           echo '$' . number_format($tipmin, 2, '.', ',');
             ?>
        </td>
    </tr>  
    <tr>
        <td>SD</td>        
        <td><?php 
           echo '$' . number_format($std, 2, '.', ',');
             ?>
        </td>
    </tr>  
     <tr>
        <td>Total Earned</td>        
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
        },{
            label: 'Average',
            data: [
                @foreach ($wage as $pay)
                {{$tipavg}},
                        @endforeach
                    
            ],           
            borderColor: [
                'rgba(255,0,0,1)',
               
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.0)',
               
            ],
            
            borderWidth: 1.5
        }
        ,{
            label: 'Running average',
            data: [
                <?php $a = 0; $c = 0;?>
                @foreach ($wage as $pay)
                <?php 
                    $a = (($a*$c) + $pay['tip'])/($c+1);
                    $c = $c+1;
                    echo $a.",";
                ?>
                @endforeach
                    
            ],           
            borderColor: [
                'rgba(0,255,0,1)',
               
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.0)',
               
            ],
            
            borderWidth: 1.5
        }
    
            ]
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


        
        
        
        
       
        
       
 
