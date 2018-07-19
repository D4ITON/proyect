@extends('layouts.app')

@section('content')


<form action="{{ route('asistencias.store',['clase_id'=> $clase_id, 'curso_id'=> $curso_id]) }}" method="POST" role="form">
	{!! csrf_field() !!}
	<h1>Curso: {{ $nombre_curso }}</h1>
	<h2>Clase: {{$nombre_clase}}</h2>
	
	@if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif

	<table class="table table-responsive-sm">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Apellido</th>
			<th>Nombre</th>
			<th><input type="checkbox" name="selecciontodo"  id="checkall"></th>
		</tr>
	</thead>
	<tbody>
			@foreach($users as $user)
			<tr>
				<td><label for="{{$user->id}}" class="{{ $user->id }}">{{ $user->id }} </label></td>
				<td><label for="{{$user->id}}" class="{{ $user->id }}">{{ $user->name }} </label></td>
				<td><input type="hidden" name="user_id[{{$user->id}}]" value="{{$user->id}}"></td>
				<td>
					<div class="checkbox">
						<input type="hidden" name="select[{{$user->id}}]"  class="" value="0" />
						<input type="checkbox" name="select[{{$user->id}}]" id="{{$user->id}}" class=" checkbox" value="1">
						<label for="{{$user->id}}" class="label"></label>
					</div>
				</td>



			</tr>
			@endforeach
	</tbody>
	</table>

@if (session()->has('regresar') or $tomo_asistencia == '1')
		<br>
		{{-- <input class="btn btn-primary btn-sm" type="submit" value="guardar"  disabled=""> --}}
		{{-- <input type="hidden" name="guardar" value="1"> --}}
		<a class="btn btn-primary btn-sm" href="{{ route('asistencias.clases',$clase_id) }}">Regresar</a>
@else
	
	<input class="btn btn-primary btn-sm" type="submit" name="guardar" value="guardar">
	<input type="hidden"  name="guardar" value="1">
	
@endif
</form>


@stop

