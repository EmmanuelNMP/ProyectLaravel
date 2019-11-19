
	<div class="col-xs-3">	
	{!!Form::open(array('url'=>'lista/consultores','method'=>'GET','autocomplete'=>'off'))!!}
		<div class="input-sm ">
			<h2><small>Seleccione el periodo</small></h2>
			<table class="table-responsive">
				<tr>
					<td>De:</td>
					<td>
						<select class="input-sm" name="mesi">
		        			@for ($j = 1; $j <=12; $j++)
		    					@if($j < 10)
		    						<option>{{ '0'.$j }}</option>
		    					@else
		    						<option>{{ $j }}</option>
		    					@endif
							@endfor
						</select>
					</td>
					<td>
						<select class="input-sm" name="añoi">
						    @for ($i = 2003; $i < 2008; $i++)
		    					<option>{{ $i }}</option>
							@endfor
						</select>
					</td>
				</tr>
				<tr>
					<td>a:</td>
					<td>
						<select class="input-sm" name="mesf">
		        			@for ($j = 1; $j <=12; $j++)
		        				@if($j < 10)
		    						<option>{{ '0'.$j }}</option>
		    					@else
		    						<option>{{ $j }}</option>
		    					@endif
							@endfor
				    	</select>
					</td>
					<td>
						<select class="input-sm" name="añof">
						    @for ($i = 2003; $i < 2008; $i++)
		    					<option>{{ $i }}</option>
							@endfor
						</select>			
					</td>
				</tr>
			</table>
			<h2><small>Consultores</small></h2>
			
			<table class="table-responsive">
				@foreach($consultores as $consul)
				<tr>
					<td>
	    				<label><br>
	    					{{Form::checkbox('consul[]',$consul->no_usuario)}} {{$consul->no_usuario}}
	    				</label>	
	    			</td>
	    		</tr>
				@endforeach
				<tr>
					<td>
						<span><button type="submit" class="btn btn-info">Relatorio</button></span>
						@if ($errors->has('consul[]'))
							<span class="help-block">
								<strong>{{'Seleccione un nombre de consultor'}}</strong>
							</span>
						@endif
					</td>
				</tr>
			</table>
		</div>
		{{Form::close()}}
	</div>