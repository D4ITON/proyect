@extends('layouts.app')

@section('content')

<h1>Curso: {{ $nombre }}</h1>
@if (auth()->user()->isDelegado())
<a class="btn btn-info" href="{{ route('asistencias.createclases',$curso_id) }}">Nuevo</a>
<br>
@endif
<br>
<table class="table table-responsive-sm">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tema</th>
			<th>Fecha</th>
			<th>Tomó asistencia</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($clases as $clase)
			<tr>
				<td>{{ $clase->id }}</td>
				<td>{{ $clase->tema }}</td>
				<td>{{ $clase->created_at }}</td>
				<td>{{ ($clase->tomo_asistencia == true)? 'SI' : 'NO' }}</td>
				<td>
					@if (auth()->user()->hasRoles(['delegado', 'admin']))
					<a class="btn btn-primary btn-sm" href="{{ route('asistencias.create',['clase_id'=>$clase->id, 'curso_id'=>$curso_id]) }}">Tomar Asistencia</a>
					@endif
					<a class="btn btn-success btn-sm" href="{{ route('asistencias.show',['clase_id'=>$clase->id, 'curso_id'=>$curso_id]) }}">Ver Asistencia</a>
					@if (auth()->user()->hasRoles(['admin','delegado']))
						<form style="display: inline" method="POST" action="{{ route('asistencias.destroy',$clase->id) }}">
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}
								<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						</form>
					@endif
			</tr>
		@endforeach
	</tbody>
</table>

@stop