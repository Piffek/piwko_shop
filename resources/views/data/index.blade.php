@extends('layouts.app')

@section('content')
<div class="container">
	<div class ="col-md-3 col-md-offset-4">
		<div class="panel panel-info">
			<div class="panel-heading"> 
				<h3 class="panel-title">Twoje dane</h3> 
			</div>
			@foreach($data_users as $data_user)
				<div class="panel-body"> 
					<div class="container">
						<p>Imię i nazwisko: {{$data_user -> surname}}</p>
						<p>E-mail: {{$data_user -> email}}</p>
						<p>Miasto: {{$data_user -> city}}</p>
						<p>Ulica: {{$data_user -> street}}</p>
						<p>Telefon: {{$data_user -> phone}}</p>
						<p>Firma: {{$data_user -> companyname}}</p>
						<p>NIP: {{$data_user -> nip}}</p>
						<a class='btn btn-warning' href="{{route('editData',['id'=>$data_user->id])}}">Edytuj dane</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
