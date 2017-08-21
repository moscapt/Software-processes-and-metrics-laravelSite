@extends('layout.master')

@section('title')
	| Produtos
@stop

@section('header')
	Produtos
@stop

@section('content')
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Tipo</th>
			<th>Quantidade</th>
			<th>Mínimo</th>
			<th>Máximo</th>
			<th>Editar</th>
		</thead>
		<tbody>
			@foreach($products_id as $pdt_id)
				<tr>

					<td>{{ $pdt_id->product_id }}</td>
					<td>{{ DB::table('products')->where('id','=',$pdt_id->product_id)->pluck('type') }}</td>
					<td>{{ $pdt_id->quantity }}</td>
					<form action="{{ URL::route('stock-min-max-post') }}" method="post">
						<td><input type="number" name="min" value="{{ $pdt_id->min }}" ></td>
						<td><input type="number" name="max" value="{{ $pdt_id->max }}" ></td>
						<td><input type="hidden" name="product_id" value="{{ $pdt_id->product_id }}" >
							<input type="submit" value="Guardar" class="btn btn-default" >
							{{ Form::token() }}
						</td>
					</form>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop