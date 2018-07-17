@extends('layouts.app')

@section('content')

<form action="{{ route('cursos.store') }}" method="POST" role="form">
	{!! csrf_field() !!}
	<legend>Creacion de nuevo curso</legend>

	<div class="form-group">

		<br>
			<label for="nombre">Nombre de curso</label>
			<input type="text" class="form-control" name="nombre">
		<br>
			<label for="nombre">Docente</label>
			<input type="text" class="form-control" name="docente">
		<br>

	</div>
<input class="btn btn-primary" type="submit" value="guardar">
</form>
@stop