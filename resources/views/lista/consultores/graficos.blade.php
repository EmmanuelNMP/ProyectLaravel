<html>
  <head>

@isset($filtro_nombres)
	@php $n=0; $t=0; $prom=0; @endphp
    @foreach($filtro_nombres as $fn)
		@foreach($totales as $tot)
			@if($tot->no_usuario==$fn)
				@php  
					$n++;
					$t=$t+$tot->totfixo;
				@endphp
			@endif
		@endforeach
	@endforeach
	@if($n>1)
		@php $prom=$t/$n; @endphp
	@else
		@php $prom=1; @endphp
	@endif

	{{--Gráfico 1--}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
  
        var data = google.visualization.arrayToDataTable([
          ['Consultor', 'Ganancia', 'Costo', 'Promedio de Costo fijo'],
			@foreach($filtro_nombres as $fn)
			  	@foreach($totales as $tot)
					@if($tot->no_usuario==$fn)
						['{{$tot->no_usuario}}',{{round($tot->totliquida,2)}},{{round($tot->totfixo,2)}},{{round($prom,2)}}],
					@endif
				@endforeach
			@endforeach
        ]);

        var options = {
			title : 'Relación Costo - Beneficio por Consultores',
			vAxis: {title: 'Valor en euros'},
			hAxis: {title: 'Consultores'},
			seriesType: 'bars',

			series: {2: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
   
   {{--Gráfico 2--}}
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Consultor', 'Ganancia'],
          
          @foreach($filtro_nombres as $fn)
			  	@foreach($totales as $tot)
					@if($tot->no_usuario==$fn)
						['{{$tot->no_usuario}}',{{round($tot->totliquida,2)}}],
					@endif
				@endforeach
			@endforeach
        ]);

        var options = {
			title: 'Porcentaje de Ganancias por Consultor',
			is3D:true

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@else
	<div class="container" style="height:900px;">
		<div class="row" style="height: 50%;">
			<div class="col-xs-3"></div>
			<div class="col-xs-9">
              		<p class="alert alert-info">Lista de Consultores: Selecciona en las opciones de la izquierda, la fecha y los nombres de los Consultores de quienes deseas ver su desempeño </p>
			</div>
		</div>
	</div>

@endisset
</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-3"></div>
				<div class="col-xs-9" id="chart-wrap">		
	              		<div id="chart_div"></div>   		
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3"></div>
				<div class="col-xs-9"id="chart-wrap">
						<div id="piechart"></div>
				</div>
			</div>
		</div>
	</body>
</html>
