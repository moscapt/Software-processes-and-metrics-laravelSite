@extends('layout.master')

@section('title')
	| Lojas
@stop

@section('header')
	Lojas [{{ count($stores) }}]
@stop

@section('content')
	
	@if(DB::table('stores')->where('user_id','=',Auth::user()->id)->pluck('id')==0 && Auth::user()->role != "admin")
		<table>
			<form action="{{ URL::route('stores-page-add') }}" method="post">
				<tr>
					<td>Nome: </td>
					<td><input type="text" name="name" > </td>
				</tr>
				<tr>
					<td>Morada: </td>
					<td><input type="text" name="address" ></td>
				</tr>
				<tr>
					<td><input type="submit" value="Criar" class="btn btn-default" ></td>
				</tr>
				{{ Form::token() }}
			</form>
		</table>

	<br />
	@endif

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Morada</th>
				<th>Cliente</th>
				<th>Detalhes</th>
			</tr>
		</thead>
		<tbody>
			@foreach($stores as $str)

				<tr>
					<td>{{ $str->id }}</td>
					<td>{{ $str->name }}</td>
					<td>{{ $str->address }}</td>
					<td>{{ User::where('id','=',$str->user_id)->pluck('username') }}</td>
					<td><a href="{{ URL::route('home') }}<?php echo "/loja/".$str->id; ?>">[Detalhes]</a></td>
				</tr>

			@endforeach
		</tbody>
	</table>
@stop