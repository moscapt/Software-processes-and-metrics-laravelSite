@extends('layout.master')

@section('title')
	| Editar produto
@stop

@section('header')
	Editar produto
@stop

@section('content')
	
	<table>
		<form action="{{ URL::route('product-edit-post') }}" method="post">
			<tr>
				<td>Tipo: </td><td><input type="text" name="new_type" /></td>
				<td><input type="submit" value="OK" class="btn btn-default" />
					<input type="hidden" name="id" value="{{ $prod->id }}" />
					{{ Form::token() }}
				</td>
			</tr>
		</form>
	</table>

@stop