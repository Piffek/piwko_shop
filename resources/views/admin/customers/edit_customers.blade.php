@extends('layouts.admin')
@section('content')
<div class="row">
	<div class ="col-md-3 col-md-offset-4">
		<div class="panel panel-info">
			<div class="panel-heading"> <h3 class="panel-title">Edytuj</h3> </div>
			      <form method="post" action="/admin/edit_customers/update/{{$user->id}}">
					{!! csrf_field() !!}
					<p>Nick: <input style="width:150px" id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
					 <p>Imię i nazwisko: <input style="width:150px" id="surname" type="text" class="form-control" name="surname" value="{{$user->surname}}">
					 <p>E-mail: <input style="width:150px" id="email" type="text" class="form-control" name="email" value="{{$user->email}}">
					 <p>Ulica: <input style="width:150px" id="street" type="text" class="form-control" name="street" value="{{$user->street}}">
					 <p>Miasto: <input style="width:150px" id="city" type="text" class="form-control" name="city" value="{{$user->city}}">
					 <p>Telefon: <input style="width:150px" id="phone" type="text" class="form-control" name="phone" value="{{$user->phone}}" >
					 <p>Firma: <input style="width:150px" id="companyname" type="text" class="form-control" name="companyname" value="{{$user->companyname}}">
					 <p>NIP: <input style="width:150px" id="nip" type="text" class="form-control" name="nip" value="{{$user->nip}}">
					<br>
					<input type="submit" class="btn btn-success" value="Zapisz"></tr>
					</p>
				</form>
		</div>
	 </div>
  </div>
</div>


@endsection
