{!! csrf_field() !!}

<div class="form-group">
	
	
	<label for="tema">
		Tema
		<input class="form-control" type="text" name="tema" value="{{ $clase->tema or old('tema') }}">
		{{ $errors->first('tema') }}
	</label>

