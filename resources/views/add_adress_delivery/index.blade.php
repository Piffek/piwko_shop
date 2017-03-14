@extends('layouts.app')





@section('content')
<div class="container">
<div class ="col-md-3 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading"> 
			<h3 class="panel-title">Dodaj adres dostawy</h3> </div>
				<div class="panel-body"> 
					<form method="post" action="/dodaj_adres_dostawy/store">
					{!! csrf_field() !!}
						<input hidden name="id_user" value="{{Auth::user()->id}}"></td></tr>
					 Ulica: <input style="width:150px" id="street" type="text" class="form-control" name="street" required autofocus>
					 Miasto: <input style="width:150px" id="city" type="text" class="form-control" name="city"  required autofocus>
					 Telefon: <input style="width:150px" id="phone" type="text" class="form-control" name="phone"  required autofocus>
					 <input type="submit" value="Dodaj"></tr>
					</form>
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
								<td><form method="POST" action="/dodaj_adres_dostawy/destroy/{{$add_adres->id}}">
								{!! csrf_field() !!}
								<input type="submit" value="Usuń"></tr>
								</form></td>
						@endforeach		
													</tbody>
				</table>
					
		</div>	
		</div>
	@endif

</div>



@endsection


		