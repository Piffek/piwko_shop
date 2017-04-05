@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-8 col-md-offset-3">
   			{!! Form::open(['route' => 'adminAddProductStore','files' => true]) !!}
   				<div class="col-md-3">
	   				{!! Form::label('Nazwa Produktu') !!}<br>
					{!! Form::text('product') !!}<br>
					{!! Form::label('Cena') !!}<br>
					{!! Form::text('price') !!}<br>
					{!! Form::label('Ilosc') !!}<br>
					{!! Form::text('amount') !!}<br>
				</div>
				<div class="col-md-3">
					Rodzaj:
					<select name="kind">
						@foreach($kinds as $kind)
						  <option value="{{$kind->name}}">{{$kind->name}}</option>
						@endforeach
					</select>
	   				{!! Form::label('Przeznaczenie') !!}<br>
					{!! Form::text('intended') !!}<br>
					{!! Form::label('Wymiary Ogólne') !!}<br>
					{!! Form::text('general_size') !!}<br>
					{!! Form::label('Wymiary') !!}<br>
					{!! Form::text('size') !!}<br>
				</div>
				<div class="col-md-3">
	   				{!! Form::label('Promocja') !!}<br>
					{!! Form::text('promotion') !!}<br>
					{!! Form::label('Procent Promocji') !!}<br>
					{!! Form::text('percent_promotion') !!}<br>
					{!! Form::label('Tekst Promocji') !!}<br>
					{!! Form::text('text_promotion') !!}<br>
				</div>
				{!! Form::file('image') !!}
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						{!! Form::label('Opis') !!}<br>
						{!! Form::text('desc') !!}<br>
					</div>
				</div>
				{!! Form::submit('Dodaj') !!}
			{!! Form::close() !!}
	</div>
</div>


@endsection
