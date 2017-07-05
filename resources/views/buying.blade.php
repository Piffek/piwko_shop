@extends('layouts.app')





@section('content')
<div class="container">
	@if (count($buyings) === 0)
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		  <div class="panel-heading">Twoje zakupy</div>
		  	<table class="table">

		  	Nic nie kupiłes
		  	</table>
		 </div>
	</div>
		   	@elseif (count($buyings) > 0)
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
						@foreach($buyings as $itemInBuyingPage)
							<tbody>
							   	<td>{{$itemInBuyingPage->product}}</td>
								<td>{{$itemInBuyingPage->price}}</td>
								<td>{{$itemInBuyingPage->amount}}</td>
								<td>{{$itemInBuyingPage->created_at}}</td>
								<td><a class='btn btn-warning' href="{{route('billsPDF',['id'=>$itemInBuyingPage->id])}}">Faktura</a></td>
							</tbody>
						@endforeach
					</table>
							{{ $buyings->links() }}	
				</div>	
			@endif
		</div>
</div>

@endsection