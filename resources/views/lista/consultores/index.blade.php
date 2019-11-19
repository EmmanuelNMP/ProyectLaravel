@extends ('layouts.admin')
@section ('contenido')
@include ('lista.consultores.busca')

	<div class="col-xs-9">
	@isset($filtro_nombres)
		@foreach ($filtro_nombres as $fn)
			@foreach($totales as $tot)
				@if($tot->no_usuario==$fn)
					<div class="box">
						<div class="box-header with-border">	
			            	<h1 class="box-title" name="no">{{$fn}}</h1>
			        	</div>
			        	<div class="box-body table-responsive">
				        	<table class="table table-responsive table-hover">
								<tbody>
									@foreach($liquida as $liq)
										@if ($liq->no_usuario == $tot->no_usuario)
											<tr>
												<td align="left">{{$liq->mes}}</td>
												<td align="right">{{round($liq->valor,2)}}</td>
												<td align="right">{{round($liq->brut_salario,2)}}</td>
												<td align="right">{{round($liq->comissao_cn,2)}}</td>
												<td align="right">{{round($liq->lucro,2)}}</td>
											</tr>
										@endif
									@endforeach
								</tbody>
								<thead>
									<tr>
										<th>Período</th>
										<th>Receita Líquida</th>
										<th>Custo Fixo</th>
										<th>Comissao</th>
										<th>Lucro</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Saldo</th>
										<td align="right">{{round($tot->totliquida,2)}}</td>
										<td align="right">{{round($tot->totfixo,2)}}</td>
										<td align="right">{{round($tot->totcomissao,2)}}</td>
										<td align="right">{{round($tot->totlucro,2)}}</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				@endif
			@endforeach	
		@endforeach
	@endisset
	</div>
@include('lista.consultores.graficos')
@endsection
		
        							
				        
    			
				
