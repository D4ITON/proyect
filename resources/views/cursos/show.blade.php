@extends('layouts.app')

@section('content')

<h1>{{ $cursos->nombre }}</h1>

<table class="table table-responsive-sm">
	
	<tr>
		<th>Nombre:</th>
		<td>{{ $cursos->nombre }}</td>
	</tr>

	<tr>
		<th>Docente:</th>
		<td>{{ $cursos->docente }}</td>
	</tr>

	<tr>
		<th>Fecha de creación:</th>
		<td>{{ $cursos->created_at }}</td>
	</tr>

</table>


@stop