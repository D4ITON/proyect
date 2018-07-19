{!! csrf_field() !!}

<div class="form-group">
	
	
	<p><label for="codigo">
		Codigo Universitario
		<input class="form-control" type="text" name="codigo" value="{{ $user->codigo or old('codigo') }}">
		{{ $errors->first('codigo') }}
	</label></p>

	<p><label for="name">
		Nombre
		<input class="form-control" type="text" name="name" value="{{ $user->name or old('name') }}">
		{{ $errors->first('name') }}
	</label></p>

	<p><label for="last_name">
		Apellidos
		<input class="form-control" type="text" name="last_name" value="{{ $user->last_name or old('last_name') }}">
		{{ $errors->first('last_name') }}
	</label></p>

	<p><label for="email">
		Email
		<input class="form-control" type="text" name="email" value="{{ $user->email or old('email') }}">
		{{ $errors->first('email') }}
	</label></p>

@unless ($user->id)

	<p><label for="password">
		Contraseña
		<input class="form-control" type="password" name="password">
		{{ $errors->first('password') }}
	</label></p>

	<p><label for="password_confirmation">
		Confirmar Contraseña
		<input class="form-control" type="password" name="password_confirmation">
		{{ $errors->first('password_confirmation') }}
	</label></p>

@endunless
@if (auth()->user()->isAdmin())
	<div class="checkbox">
		<p>Roles</p>
		@foreach ($roles as $id => $name)
			<label>
				<input 
					type="checkbox" 
					value="{{ $id }}"
					{{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }} 
					name="roles[]">
					{{ $name }}
			</label>
		@endforeach

	{{ $errors->first('roles') }}
	</div>
@endif
</div>
<hr>