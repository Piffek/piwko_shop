@extends('layouts.admin')
@section('content')
<div class="row">
<div class ="col-md-3 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading"> 
			<h3 class="panel-title">Dodaj nowa role</h3> </div>
	      <form method="post" action="/admin/add_role">
	      {!! csrf_field() !!}
	       	<p>Nazwa: <input style="width:150px" id="role_name" type="text" class="form-control" name="name"">
			<br>
			<input type="submit" class="btn btn-success" value="Zapisz"></tr>
      </div>
    </div>
  </div>
</div>


@endsection