@extends('layout.master')

@section('title')
	| Registar Vendas
@stop

@section('header')
	Registar Vendas
@stop

@section('content')
	
	@if(Session::get('msg'))
			<div class="alert alert-warning">{{ Session::get('msg') }}</div>
	@endif

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Produto</th>
				<th>Quantidade</th>
				<th>Mínimo</th>
				<th>Máximo</th>
				<th>Registar Venda</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach($products as $pdt)
				<form action="{{ URL::route('register-sales-post') }}" method="post">
					<tr>
						<td>{{ Product::where('id',DB::table('stores_has_products')
									->where('product_id','=',$pdt->product_id)->first()->product_id)->pluck('type')
							}}
						</td>
						<td>{{ $pdt->quantity }}
							<input type="hidden" name="quantity" value="{{ $pdt->quantity }}">
						</td>
						<td>{{ $pdt->min }}<input type="hidden" name="min" value="{{ $pdt->min }}"></td>
						<td>{{ $pdt->max }}<input type="hidden" name="max" value="{{ $pdt->max }}"></td>
						@if($pdt->quantity > 0)
							<td><input type="submit" value="Venda" class="btn btn-default" >
						@else
							<td><input type="submit" value="Venda" class="btn btn-default" disabled="disabled">
						@endif
								<input type="hidden" value="{{ $pdt->product_id }}" name="product_id">
						</td>
					</tr>
					{{ Form::token() }}
				</form>
			@endforeach
		</tbody>
		
	</table>
	
@stop