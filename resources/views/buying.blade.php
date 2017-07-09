@extends('layouts.app')





@section('content')
<div class="container">
	@if (count($buy) === 0)
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		  <div class="panel-heading">Twoje zakupy</div>
		  	<table class="table">

		  	Nic nie kupiłes
		  	</table>
		 </div>
	</div>
		   	@elseif (count($buy) > 0)
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
						@foreach($buy as $buying)
							<tbody>
							   	<td>{{$buying->product}}</td>
								<td>{{$buying->price}}</td>
								<td>{{$buying->amount}}</td>
								<td>{{$buying->created_at}}</td>
								<td><a class='btn btn-warning' href="{{route('billsPDF',['id'=>$buying->id])}}">Faktura</a></td>
							</tbody>
						@endforeach
					</table>
							{{ $buy->links() }}	
				</div>	
			@endif
		</div>
</div>
@endsection