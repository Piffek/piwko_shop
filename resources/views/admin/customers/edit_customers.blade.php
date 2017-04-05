@extends('layouts.admin')
@section('content')
<div class="row">
	<div class ="col-md-3 col-md-offset-4">
		<div class="panel panel-info">
			<div class="panel-heading"> <h3 class="panel-title">Edytuj</h3> </div>
				{!! Form::open(['route' => ['adminEditCustomers', $user->id ]]) !!}
					{!! Form::label('Nick') !!}<br>
					{!! Form::text('name',$user->name) !!}<br>
					{!! Form::label('Imię i nazwisko') !!}<br>
					{!! Form::text('surname',$user->surname) !!}<br>
					{!! Form::label('Email') !!}<br>
					{!! Form::text('email',$user->email) !!}<br>
					{!! Form::label('Ulica') !!}<br>
					{!! Form::text('street',$user->street) !!}<br>
					{!! Form::label('Miasto') !!}<br>
					{!! Form::text('city',$user->city) !!}<br>
					{!! Form::label('Telefon') !!}<br>
					{!! Form::text('phone',$user->phone) !!}<br>
					{!! Form::label('Firma') !!}<br>
					{!! Form::text('companyname',$user->companyname) !!}<br>
					{!! Form::label('NIP') !!}<br>
					{!! Form::text('nip',$user->nip) !!}<br>
					<br>
					{!! Form::submit('Zmień') !!}
				{!! Form::close() !!}
				{!! Form::open(['route' => ['adminEditRolesCustomers', $user->id ]]) !!}
				<select name="roles_id">
					 @foreach($rolesHas as $roleUser)
						 <option>{{ $roleUser->name }}</option>
					 @endforeach
					 @foreach($roles as $role)
							<option value="{{ $role->id }}">{{ $role->name }}</option>
					 @endforeach
				</select>
				{!! Form::submit('Zmień') !!}
			{!! Form::close() !!}
		</div>
	 </div>
  </div>
</div>


@endsection
