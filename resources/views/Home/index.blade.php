@extends('layouts.layout')
@section('content')
<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<a href="{{ route('users') }}" class="btn btn-default btn-app radius-4">
											<i class="ace-icon fa fa-users bigger-230"></i>
											Users
											
										</a>
										<a href="{{ route('cases') }}" class="btn btn-danger btn-app radius-4">
											<i class="ace-icon fa fa-cogs bigger-230"></i>
											Cases
											
										</a>
										<a href="{{ route('merits') }}" class="btn btn-info btn-app radius-4">
											<i class="ace-icon fa fa-book bigger-230"></i>
											Merit
											
										</a>
										<a href="{{ route('demerits') }}" class="btn btn-warning btn-app radius-6">
											<i class="ace-icon fa fa-book bigger-230"></i>
											Demerit
											
										</a>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						<div class="row">
							 <div class="x_panel">
							 <div class="col-md-6 col-sm-6 col-xs-6">
             <div id="piechart" style="height: 500px"></div>
             
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
             <div id="barchart" style="height: 500px"></div>
             
            </div>
						</div>
					</div>
						<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
						<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'Total Points'],
          ['Merits',     {{$merits}}],
          ['Demerits',      {{$demerits}}]
          
        
        ]);

        var options = {
          title: 'Merit/Demerit Points',
          //is3D: true,
          pieHole: 0.4,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        //var chart = new google.visualization.BarChart(document.getElementById('barchart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'Total Points'],
          ['Merits',     {{$merits}}],
          ['Demerits',      {{$demerits}}]
          
        
        ]);

        var options = {
          title: 'Merit/Demerit Points',
          //is3D: true,
          //pieHole: 0.4,

        };

        //var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        var chart = new google.visualization.BarChart(document.getElementById('barchart'));

        chart.draw(data, options);
      }
    </script>
@endsection