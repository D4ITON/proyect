{!! csrf_field() !!}

<div class="form-group">
	
	<label for="tema" class="row">
		Tema
		<input class="form-control" type="text" name="tema" value="{{ $clase->tema or old('tema') }}">
		{{ $errors->first('tema') }}
		<input type="hidden" name="tomo_asistencia" value="0">		
	</label>
</div>
<hr>
