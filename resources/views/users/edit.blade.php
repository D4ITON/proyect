@extends('layouts.app')

@section('content')

<h1>Editar</h1>
	@if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif	
<form action="{{ route('usuarios.update',$user->id) }}" method="POST" role="form">
	{!! method_field('PUT') !!}

	@include('users.form')

<input class="btn btn-primary" type="submit" value="guardar">
</form>


@stop