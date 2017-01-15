@extends('layouts.admin')





@section('content')
<div class ="col-md-3 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading"> 
			<h3 class="panel-title">Dane klienta</h3> </div>
		@foreach($users as $user)
		<div class="panel-body"> 
			<div class="container">
				<p>Imię i nazwisko: {{$user -> surname}}</p>
				<p>E-mail: {{$user -> email}}</p>
				<p>Miasto: {{$user -> city}}</p>
				<p>Ulica: {{$user -> street}}</p>
				<p>Telefon: {{$user -> phone}}</p>
				<p>Firma: {{$user -> companyname}}</p>
				<p>NIP: {{$user -> nip}}</p>
				<a href="{{url('/admin/edit_customers/'.$user->id.'')}}" class="btn btn-primary" role="button">Edytuj</a>
				<a href="{{url('/admin/delete_customers/'.$user->id.'')}}" class="btn btn-danger" role="button">Usuń</a>
			</div>
		</div>
		@endforeach
		</div>
	</div>
</div>
@endsection