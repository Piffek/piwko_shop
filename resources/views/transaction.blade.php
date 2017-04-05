@extends('layouts.app')

@section('content')
<div class ="col-md-3 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading"> 
			<h3 class="panel-title">Dane do dostawy</h3> </div>
		@foreach($data_users as $data_user)
		<div class="panel-body"> 
			<div class="container">
				<p>Imię i nazwisko: {{$data_user -> surname}}</p>
				<p>Miasto: {{$data_user -> city}}</p>
				<p>Ulica: {{$data_user -> street}}</p>
				<p>Telefon: {{$data_user -> phone}}</p>
				<p>Firma: {{$data_user -> companyname}}</p>
				<p>NIP: {{$data_user -> nip}}</p>
			</div>
		</div>
		@endforeach
		
		</div>
			<div class="panel panel-info"> 
					<div class="panel-heading">
						<h3 class="panel-title">Wybierz sposób płatnosci i dostawy</h3> </div>
							<div class="panel-body"> 
								<div class="container">
								{!! Form::open(['route' => 'buyingCreate']) !!}
								<h3>Sposób dostawy</h3>
									DPD<input name="delivery" type="checkbox" value="DPD" >
									<br>UPS<input name="delivery" type="checkbox" value="UPS">
								<h3>Sposób płatnosci</h3>
									Przedpłata<input name="paying" type="checkbox" value="przedplata">
									<br>Pobranie<input name="paying" type="checkbox" value="pobranie">
								</div>
							</div>
						</div>
									
		</div>
		<div class ="col-md-3 col-md-offset-8">
			@foreach($data_deals as $data_deal)
				@if(count($data_deal->id) > 0)
				<div class="panel panel-info"> 
					<div class="panel-heading">
						<h3 class="panel-title">Wybierz inne dane dostawy</h3> </div>
							<div class="panel-body"> 
								<div class="container">
									Miasto:<br>
									{!! Form::label($data_deal -> city) !!}
									{!! Form::hidden('city',$data_deal -> city) !!}<br>
									Ulica:<br>
									{!! Form::label($data_deal -> street) !!}
									{!! Form::hidden('street',$data_deal -> street) !!}<br>
									Telefon:<br>
									{!! Form::label($data_deal -> phone) !!}
									{!! Form::hidden('phone',$data_deal -> phone) !!}
									{!! Form::checkbox('id_adress_delivery',$data_deal->id) !!}
								</div>
							</div>

					</div>
				@else
					<p>Nie dodałes innych miejsc dostawy</p>
				@endif
			@endforeach
							{!! Form::submit('Dodaj') !!}
		{!! Form::close() !!}

@endsection