@extends('layout.master')

@section('title')
	| Encomendar
@stop

@section('header')
	Encomendar
@stop

@section('content')
	<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tipo</th>
					<th>Quantidade</th>
					<th>Encomendar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $pdt)
					<form action="{{ URL::route('order-product-post') }}" method="post">
						<tr>
							<td>{{ $pdt->id }}</td>
							<td>{{ $pdt->type }}</td>
							<td><input type="number" size="3" name="quantity" ></td>
							<td>
								<input type="submit" value="Encomendar" class="btn btn-default">
								<input type="hidden" name="product_id" value="{{ $pdt->id }}" >
								<input type="hidden" name="product_type" value="{{ $pdt->type }}">
							</td>
						</tr>
						{{ Form::token() }}
					</form>
				@endforeach
			</tbody>

	</table>
@stop