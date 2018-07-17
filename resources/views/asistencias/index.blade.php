@extends('layouts.app')

@section('content')

<h1>ASISTENCIAS</h1>
	<table class="table table-responsive-sm">
		<thead>
			<tr>
				<th>ID</th>
				<th>Curso</th>
				<th>Docente</th>
				<th>Acciones</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach ($cursos as $curso)
			<tr>
				<td>{{ $curso->id }}</td>
				<td>{{ $curso->nombre }}</td>
				<td>{{ $curso->docente }}</td>
				<td>
					
					<a class="btn btn-warning btn-sm" href="{{ route('asistencias.clases',$curso->id) }}">Clases</a>
				@if (auth()->user()->hasRoles(['admin']))
					<a class="btn btn-success btn-sm" href="{{ route('asistencias.vergeneral',$curso->id) }}">Asistencias General</a>
				@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@stop