@extends('layouts.app')





@section('content')
<div class="container">
@if(!Session::has('basket'))
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
	  <div class="panel-heading">Koszyk</div>
		<table class="table">
		  Nie masz produktów w koszyku
		 </table>
	</div>
</div>
@else
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
				 @foreach($products as $p)
					<tbody>
					   	<td>{{$p['product']}}</td>
						<td>{{$p['price']*$p['amount']}}</td>
						<td>{{$p['amount']}}</td>
						<td><a href="{{route('deleteBasketGuest',['id'=>$p['random_id']])}}" class="btn btn-danger pull-right" role="button">Usuń</a></td>
					</tbody>
				@endforeach		
			</table>
		</div>	
		<a href="{{route('guestTransaction')}}">Zrealizuj</a>
		
	</div>	
@endif
</div>
 @endsection
 
                                

