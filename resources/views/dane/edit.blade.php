@extends('layouts.app')





@section('content')

<div class ="col-md-3 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading"> 
			<h3 class="panel-title">Twoje dane</h3> </div>
				<div class="panel-body"> 
					<form method="post" action="/dane/update/{{$data_users->id}}">
					{!! csrf_field() !!}
					 Imię i nazwisko: <input style="width:150px" id="surname" type="text" class="form-control" name="surname" value="{{$data_users->surname}}" required autofocus>
					 E-mail: <input style="width:150px" id="email" type="text" class="form-control" name="email" value="{{$data_users->email}}" required autofocus>
					 Ulica: <input style="width:150px" id="street" type="text" class="form-control" name="street" value="{{$data_users->street}}" required autofocus>
					 Miasto: <input style="width:150px" id="city" type="text" class="form-control" name="city" value="{{$data_users->city}}" required autofocus>
					 Telefon: <input style="width:150px" id="phone" type="text" class="form-control" name="phone" value="{{$data_users->phone}}" required autofocus>
					 Firma: <input style="width:150px" id="companyname" type="text" class="form-control" name="companyname" value="{{$data_users->companyname}}" required autofocus>
					 NIP: <input style="width:150px" id="nip" type="text" class="form-control" name="nip" value="{{$data_users->nip}}" required autofocus>
					<input type="submit" value="Zapisz"></tr>
					</form>
				</div>
	</div>
</div>

@endsection


		