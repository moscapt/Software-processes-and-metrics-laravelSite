@extends('layout.master')

@section('title')
	| Início
@stop

@section('header')
	Início
@stop

@section('content')
	<p>Esta é a página principal deste website. Bem Vindo  
	@if(Auth::check())
		<a href="">{{ Auth::user()->username }}</a>
			@if(Auth::user()->role == 'admin')
				{{ '[Administrador]' }}
			@elseif(Auth::user()->role == 'super')
				{{ '[Supervisor]' }}
			@else
				{{ '[Cliente]' }}
			@endif

	@endif
	</p>
@stop