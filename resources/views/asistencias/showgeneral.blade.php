
@extends('layouts.app')

@section('content')

<h1>CURSO : {{ $nombre_curso }}</h1>


<table class="table ">
	<tr>
		<th>Docente:</th>
		<td> {{ $nombre_docente }} </td>
	</tr>

	<tr>
		<th>Numero de clases:</th>
		<td> {{ $numero_clases }} </td>
	</tr>

	<tr>
		<th>Promedio de asistentes:</th>
		<td>- 40 -</td>
	</tr>


</table>

<h2>ASISTENCIAS: </h2>
<table class="table ">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombres</th>
			<th>Parcial/Total</th>
			<th>Porcentaje</th>
		</tr>
	</thead>
	<tbody>
			{{-- @foreach ($cursos as $curso) --}}
			<tr>
				<td>2015-119063</td>
				<td>Mamani Hualpa, Dalthon</td>
				<td>20/20</td>
				<td>100%</td>
			</tr>

			<tr>
				<td>2015-119063</td>
				<td>Mamani Hualpa, Dalthon</td>
				<td>20/ {{ $numero_clases }} </td>
				<td>100%</td>
			</tr>
			{{-- @endforeach --}}
		</tbody>
</table>



@stop