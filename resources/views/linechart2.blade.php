@extends('coach.coach_dashboard');
@section('coach')

<div class="page-content">
<html>
    <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Fixtures', 'Team A', 'Team B'],
            <?php echo $data; ?>
          ]);
  
          var options = {
            title: 'Rembo Performance',
            curveType: 'function',
            legend: { position: 'bottom' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  
          chart.draw(data, options);
        }
      </script>
    </head>
    <body>
      <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </body>
  </html>
</div>

  @endsection