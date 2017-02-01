@if ($errors->has('email'))

	<span class="col-md-12 col-md-offset-4">
		<strong>{{ $errors->first('email') }}</strong>
 	</span>
 	
@endif

@if ($errors->has('password'))

	<span class="col-md-12 col-md-offset-4">
		<strong>{{ $errors->first('password') }}</strong>
	</span>

@endif

@if ($errors->has('name'))

	<span class="help-block col-md-offset-4">
		<strong>{{ $errors->first('name') }}</strong>
	</span>

@endif           