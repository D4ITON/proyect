@extends('layouts.app')

@section('content')

<h1>Crear nuevo estudiante</h1>

<form action="{{ route('usuarios.store') }}" method="POST" role="form">

	@include('users.form',['user'=> new App\User ])

<input class="btn btn-primary" type="submit" value="Guardar">
</form>

@stop