@extends('layout.master')

@section('title')
	| Notificações
@stop

@section('header')
	Notificações
@stop

@section('content')
	<table class="table">
		<tr>
			<th></th>
			<th>Descrição</th>
			<th>Tratar</th>
		</tr>
			@foreach($notifications as $ntf)
				@if($ntf->active == 1)
					<tr>
						<td><i style="color:#123582" class="glyphicon glyphicon-info-sign"></i></td>
						<td>
							{{ $ntf->description }}
						</td>
						<td>
							<a href="{{ URL::route('home') }}/notificacoes/{{ $ntf->id }}">[Tratado]</a>
						</td>
					</tr>
				@endif
			@endforeach
	</table>
@stop