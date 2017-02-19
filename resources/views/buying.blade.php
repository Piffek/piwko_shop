@extends('layouts.app')





@section('content')

	@if (count($buying) === 0)
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		  <div class="panel-heading">Twoje zakupy</div>
		  	<table class="table">

		  	Nic nie kupiłes
		  	</table>
		 </div>
	</div>
		   	@elseif (count($buying) > 0)
		   	<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
				  <div class="panel-heading">Twoje zakupy</div>
				  	<table class="table">
					  	<thread>
					  		<tr>
					  		<th>Produkt</th>
					  		<th>Cena</th>
					  		<th>Ilosc</th>
					  		<th>Data</th>
					  		<th>Faktura</th>
					  		</tr>
					  	</thread>
						@foreach($buying as $buyings)
							<tbody>
							   	<td>{{$buyings->product}}</td>
								<td>{{$buyings->price}}</td>
								<td>{{$buyings->amount}}</td>
								<td>{{$buyings->created_at}}</td>
								<td><a href="pdf/{{$buyings->id}}">Faktura</a></td>
							</tbody>
						@endforeach		
			</table>
					
		</div>	
	@endif
</div>
@endsection