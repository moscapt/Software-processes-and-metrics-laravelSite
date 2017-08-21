@extends('layout.master')

@section('title')
	| {{ $loja->name }} 
@stop

@section('header')
	 <strong>{{ $loja->name }}</strong>
@stop

@section('content')
	<p><strong>ID: </strong>{{ $loja->id }}</p>
	<p><strong>Nome: </strong>{{ $loja->name }}</p>
	<p><strong>Morada: </strong>{{ $loja->address }}</p>
	<p><strong>Cliente: </strong>{{ $loja->user_id }}</p>

	<a href="{{ URL::previous() }}">Voltar</a>
@stop