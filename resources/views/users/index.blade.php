@extends('layouts.app')

@section('content')
<h1>Estudiantes</h1>
<a class="btn btn-primary pull-right" href="{{ route('usuarios.create') }}">Crear nuevo estudiante</a>
<table class="table table-responsive-sm">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Email</th>
			<th>Rol</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
			<tr>
				<td>{{ $user->codigo }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->last_name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					{{ $user->roles->pluck('display_name')->implode(' - ') }}
					{{-- @foreach ($user->roles as $role)
						{{ $role->display_name }}
					@endforeach --}}
				</td>
				<td>
					<a class="btn btn-success btn-sm" href="{{ route('usuarios.show',$user->id) }}">Ver</a>
					<a class="btn btn-primary btn-sm" href="{{ route('usuarios.edit',$user->id) }}">Editar</a>
					<form style="display: inline" method="POST" action="{{ route('usuarios.destroy',$user->id) }}">
						{!! csrf_field() !!}
						{!! method_field('DELETE') !!}
						<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection