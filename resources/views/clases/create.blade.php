@extends('layouts.app')

@section('content')

<h1>Nueva clase de {{ $nombre }}</h1>

<form action="{{ route('asistencias.storeclases',$id) }}" method="POST" role="form">

	@include('clases.form',['clase'=> new App\Clase ])

<input class="btn btn-primary" type="submit" value="Guardar">
</form>

@stop