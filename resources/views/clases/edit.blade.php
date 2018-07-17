@extends('layouts.app')

@section('content')

<h1>Editar clase</h1>
	@if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif	
<form action="{{ route('clases.update',$user->id) }}" method="POST" role="form">
	{!! method_field('PUT') !!}

	@include('clases.form')

<input class="btn btn-primary" type="submit" value="guardar">
</form>


@stop