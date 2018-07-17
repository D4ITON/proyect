@extends('layouts.app')
@section('content')

<h1>Editar Curso</h1>

<form action="{{ route('cursos.update',$cursos->id) }}" method="POST" role="form">
	{!! method_field('PUT') !!}
	{!! csrf_field() !!}
	{{-- <legend>Editar Curso</legend> --}}

	<div class="form-group">
		
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" value="{{ $cursos->nombre }}">

		<label for="nombre">Docente</label>
		<input type="text" class="form-control" name="docente" value="{{ $cursos->docente }}">

	</div>
<input class="btn btn-primary" type="submit" value="guardar">
</form>
@stop