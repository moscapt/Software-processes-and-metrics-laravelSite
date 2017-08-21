@extends('layout.master')

@section('title')
	| Registar produto
@stop

@section('header')
	Registar novo produto
@stop

@section('content')
	<table>
		<form action="" method="post">
			<tr>
				<td>Tipo: </td>
				<td>
					<input type="text" name="product_type" class="form-control" >
						@if($errors->has('product_type'))
							<span style="color:red">{{ $errors->first('product_type') }}</span>
						@endif
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Inserir" class="btn btn-default"></td>
			</tr>

			{{ Form::token() }}
		</form>
	</table>

	<br />

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tipo</th>
				<th>Editar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $prd)
				<tr>
					<td>{{ $prd->id }}</td>
					<td>{{ $prd->type }}</td>
					<td><a href="{{ URL::route('home') }}/produto/editar/{{ $prd->id }}"><i class="glyphicon glyphicon-pencil"></i></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop