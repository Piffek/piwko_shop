@extends('layouts.app')





@section('content')
@if(Auth::check())
	@if (count($koszyk) === 0)
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		  <div class="panel-heading">Koszyk</div>
		  	<table class="table">
			  Nie masz produktów w koszyku
			 </table>
		</div>
	</div>
	@elseif (count($koszyk) > 0)
	  <div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		  <div class="panel-heading">Koszyk</div>
		  	<table class="table">
			  	<thread>
			  		<tr>
			  		<th>Produkt</th>
			  		<th>Cena</th>
			  		<th>Ilosc</th>
			  		</tr>
			  	</thread>
	
				@foreach($koszyk as $koszyks)
					<tbody>
					   	<td>{{$koszyks->product}}</td>
						<td>{{$koszyks->cena}}</td>
						<td>{{$koszyks->ilosc}}</td>
						<td><form method="POST" action="/koszyk/destroy/{{$koszyks->id}}">
						{!! csrf_field() !!}
						<input type="submit" value="Usuń"></tr>
						</form></td>
					</tbody>
				@endforeach		
	@endif
		</table>
		</div>	
		<form method="POST" action="/transakcja">
		{!! csrf_field() !!}
		<input type="submit" value="Zrealizuj"></tr>
		</form>
</div>
@else


@endif
				
@endsection