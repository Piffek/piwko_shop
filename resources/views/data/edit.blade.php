@extends('layouts.app')

@section('content')
<div class="container">
	<div style="text-align:center;" class ="col-md-3 col-md-offset-4">
		<div class="panel panel-info">
			<div class="panel-heading"> 
				<h3 class="panel-title">Twoje dane</h3>
			</div>
			<div class="panel-body"> 
			{!! Form::open(['route' => ['updateData', $data_users->id ]]) !!}
				{!! Form::label('Imię i nazwisko') !!}
				{!! Form::text('surname',$data_users->surname) !!}<br>
				{!! Form::label('Email') !!}<br>
				{!! Form::text('email',$data_users->email) !!}<br>
				{!! Form::label('Ulica') !!}<br>
				{!! Form::text('street',$data_users->street) !!}<br>
				{!! Form::label('Miasto') !!}<br>
				{!! Form::text('city',$data_users->city) !!}<br>
				{!! Form::label('Telefon') !!}<br>
				{!! Form::text('phone',$data_users->phone) !!}<br>
				{!! Form::label('Firma') !!}<br>
				{!! Form::text('companyname',$data_users->companyname) !!}<br>
				{!! Form::label('NIP') !!}<br>
				{!! Form::text('nip',$data_users->nip) !!}<br>
				{!! Form::submit('Zmień') !!}
			{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection


		
