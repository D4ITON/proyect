@extends('layouts.app')

@section('content')
<h1>Cursos</h1>
@if (auth()->user()->isAdmin())
<a class="btn btn-info" href="{{ route('cursos.create') }}">Nuevo</a>
@endif
<br>
<br>
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
					<a class="btn btn-success btn-sm" href="{{ route('cursos.show',$curso->id) }}">Ver</a>
					@if (auth()->user()->hasRoles(['admin']))
						<a class="btn btn-primary btn-sm" href="{{ route('cursos.edit',$curso->id) }}">Editar</a>
						<form style="display: inline" method="POST" action="{{ route('cursos.destroy',$curso->id) }}">
							{!! csrf_field() !!}
							{!! method_field('DELETE') !!}
							<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						</form>
					 @endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection




 