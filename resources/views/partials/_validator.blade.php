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

@if ($errors->has('phone'))

	<span class="help-block col-md-offset-4">
		<strong>{{ $errors->first('phone') }}</strong>
	</span>

@endif     

@if ($errors->has('nip'))

	<span class="help-block col-md-offset-4">
		<strong>{{ $errors->first('nip') }}</strong>
	</span>

@endif

@if ($errors->has('amount'))

	<span class="help-block col-md-offset-4">
		<strong>{{ $errors->first('amount') }}</strong>
	</span>

@endif               