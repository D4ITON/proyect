@extends('layouts.app')

@section('content')

<h1>CURSO : {{ $nombre_curso }}</h1>


<table class="table table-responsive-sm">
	<tr>
		<th>Tema:</th>
		<td>{{ $nombre_clase }}</td>
	</tr>

	<tr>
		<th>Fecha:</th>
		<td>{{ $fecha_clase }}</td>
	</tr>
	<tr>
		<th>Asistentes:</th>
		<td>{{ $asistentes }}</td>
	</tr>


</table>

<h2>ASISTENCIAS: </h2>


<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Apellidos</th>
			<th>Asistio</th>

		</tr>
	</thead>
	<tbody>
		@foreach ($asistencias as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ ($user->asistio == '1') ? 'SI' : 'NO'     }}</td>
				
			</tr>
		
		@endforeach
	</tbody>
</table>


@stop