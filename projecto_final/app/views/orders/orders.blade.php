@extends('layout.master')

@section('title')
	| Encomendas em espera
@stop

@section('header')
	Encomendas em espera
@stop

@section('content')
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Loja</th>
				<th>Fábrica</th>
				<th>Produto</th>
				<th>Quantidade</th>
				<th>Expedir</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $ord)
				<tr>
					<td>{{ $ord->id }}</td>
					<td>{{ Store::find($ord->store_id)->pluck('name') }}</td>
					<td>{{ $ord->factory_id }}</td>
					<td>{{ DB::table('products')->where('id','=',$ord->product_id)->pluck('type') }}</td>
					<td>{{ $ord->quantity }}</td>
					<td><a href="{{ URL::route('home') }}/encomenda/expedir/{{ $ord->id }}">[Expedir]</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop
