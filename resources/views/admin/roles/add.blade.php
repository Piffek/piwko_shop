@extends('layouts.admin')
@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Edytuj role</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="panel panel-info">
			<div class="panel-heading">
    @foreach($roles as $role)
     <form method="post" action="/admin/edit_role/{{$role->id}}">
    	{!! csrf_field() !!}
      <p>Nazwa: <input style="width:150px" id="role_name" type="text" class="form-control" name="name" value="{{ $role ->name }}">
          <input type="submit" class="btn btn-success" value="Zapisz">
     </form>
          <a href="/admin/delete_role/{{$role->id}}" class="btn btn-danger">Usuń</a>
     @endforeach
     </form>
     </div>
     </div>
    </div>
  </div>
</div>



<div class="row">
<div class ="col-md-3 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading"> 
			<h3 class="panel-title">Dodaj nowa role</h3> </div>
	      <form method="post" action="/admin/add_role">
	      {!! csrf_field() !!}
	       	<p>Nazwa: <input style="width:150px" id="role_name" type="text" class="form-control" name="name">
			<br>
			<input type="submit" class="btn btn-success" value="Zapisz"></tr>
      </div>
    </div>
  </div>
</div>


@endsection