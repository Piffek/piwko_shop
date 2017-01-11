 @if(Session::has('success'))
	<div class="alert alert-success" role="alert">
        <strong>Brawo:</strong> {{ Session::get('success') }}
    </div>
	
@endif