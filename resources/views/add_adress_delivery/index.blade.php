@extends('layouts.app')





@section('content')
<div class="container">
<div class ="col-md-3 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading"> 
			<h3 class="panel-title">Dodaj adres dostawy</h3> </div>
				<div class="panel-body"> 
					{!! Form::open(['route' => 'addAdressDelivery']) !!}
						{!! Form::label('Ulica') !!}
						{!! Form::text('street') !!}
						{!! Form::label('Miasto') !!}
						{!! Form::text('city') !!}
						{!! Form::label('Telefon') !!}
						{!! Form::text('phone') !!}
						{!! Form::submit('Dodaj') !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
				
	@if (count($add_adress) === 0)
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		  <div class="panel-heading">Adresy Dostawy</div>
		  	<table class="table">

		  	Nie masz żadnych dodatkowych adresów dostawy
		  	</table>
		 </div>
	</div>
	@elseif (count($add_adress) > 0)
		   	<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-heading">Twoje zakupy</div>
				  	<table class="table">
					  	<thread>
					  		<tr>
					  		<th>Ulica</th>
					  		<th>Miasto</th>
					  		<th>Telefon</th>
					  		<th>Data</th>
					  		</tr>
					  	</thread>
					  								<tbody>
						@foreach($add_adress as $add_adres)
							   	<td>{{$add_adres->street}}</td>
								<td>{{$add_adres->city}}</td>
								<td>{{$add_adres->phone}}</td>
								<td>{{$add_adres->created_at}}</td>
								<td><a href="{{route('deleteAdressDelivery',['id'=>$add_adres->id])}}">Usuń</a></td></tr>
						@endforeach		
													</tbody>
				</table>
					
		</div>	
		</div>
	@endif

</div>



@endsection


		