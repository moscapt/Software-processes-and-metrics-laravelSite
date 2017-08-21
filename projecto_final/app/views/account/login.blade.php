@extends('layout.master')

@section('title')
	| Entrar
@stop

@section('content')
	
	<div class="container-fluid">
		@if(Session::get('msg'))
			<div class="alert alert-danger">{{ Session::get('msg') }}</div>
		@endif
		<table>
			<form role="form" action="{{ URL::route('login-page-post') }}" method="post">
				<tr>
					<td>Utilizador:</td><td><input type="text" name="username" >
					@if($errors->has('username'))
						{{ $errors->first('username') }}
					@endif
					</td>
				</tr>
				<tr>
					<td>Password:</td><td><input type="password" name="password" >
					@if($errors->has('password'))
						{{ $errors->first('password') }}
					@endif
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Entrar" class="btn btn-default" ></td>
				</tr>
					{{ Form::token() }}
			</form>
		</table>
	</div>
@stop