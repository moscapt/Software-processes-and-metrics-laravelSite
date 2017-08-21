@extends('layout.master')

@section('title') 
	| Registar 
@stop

@section('header')
	Registar novo utilizador
@stop

@section('content')
	<table>
		<form role="form" action="{{ URL::route('register-page-post') }}" method="post" class="form-inline">
			<tr><div class="form-group">
				<td>Email:</td><td><input type="email" name="email" class="form-control">
									@if($errors->has('email'))
										<span style="color:red">{{ $errors->first('email') }}</span>
									@endif
							   </td>
			</div></tr>
			<tr><div class="form-group">
				<td>Nome de utilizador:</td><td><input type="text" name="username" class="form-control">
												@if($errors->has('username'))
													<span style="color:red">{{ $errors->first('username') }}</span>
												@endif
											</td>
			</div></tr>
			<tr>
				<td>Palavra-chave:</td><td><input type="password" name="password" class="form-control" >
											@if($errors->has('password'))
												<span style="color:red">{{ $errors->first('password') }}</span>
											@endif
										</td>
			</tr>
			<tr>
				<td>Repetir Palavra-chave:</td><td><input type="password" name="password_again" class="form-control" >
													@if($errors->has('password_again'))
														<span style="color:red">{{ $errors->first('password_again') }}</span>
													@endif
											    </td>
			</tr>
			<tr>
				<td>Tipo:</td><td><select name="role" class="form-control">
							<option value="admin">Administrador</option>
							<option value="super">Supervisor</option>
							<option value="user">Cliente</option>
					  </select>
					  	@if($errors->has('role'))
							<span style="color:red">{{ $errors->first('role') }}</span>
						@endif
					</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Registar" class="btn btn-default"></td>
			</tr>
			{{ Form::token() }}
		</form>
	</table>
@stop