@extends('layouts.admin')





@section('content')
<div class ="col-md-3 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading"> 
			<h3 class="panel-title">Dane klienta</h3> </div>
				<div class="panel-body"> 
					<div class="container">
						<p>Imię i nazwisko: {{$user -> surname}}</p>
						<p>E-mail: {{$user -> email}}</p>
						<p>Miasto: {{$user -> city}}</p>
						<p>Ulica: {{$user -> street}}</p>
						<p>Telefon: {{$user -> phone}}</p>
						<p>Firma: {{$user -> companyname}}</p>
						<p>NIP: {{$user -> nip}}</p>
						<a href="{{route('adminEditOneCustomer',['id'=>$user->id])}}" class="btn btn-primary" role="button">Edytuj</a>
						<a href="{{route('adminDeleteOneCustomer',['id'=>$user->id])}}" class="btn btn-danger" role="button">Usuń</a>
					</div>
				</div>
		</div>
	</div>
</div>
@endsection