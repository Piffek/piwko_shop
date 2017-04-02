@extends('layouts.app')





@section('content')
<div class="container">
@if(Auth::check())
	@if (count($basket) === 0)
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		  <div class="panel-heading">Koszyk</div>
		  	<table class="table">
			  Nie masz produktów w koszyku
			</table>
		</div>
	</div>
		@elseif (count($basket) > 0)
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
					@foreach($basket as $baskets)
					<tbody>
						<td>{{$baskets->product}}</td>
						<td>{{$baskets->price*$baskets->amount}}</td>
						<td>{{$baskets->amount}}</td>
						<td><a class="btn btn-primary" data-toggle="modal" data-target="#changeAmount{{$baskets->id }}">Zmień ilość </a></td>
						<td>
							<form method="POST" action="/koszyk/destroy/{{$baskets->id}}">
							{!! csrf_field() !!}
							<input type="submit" value="Usuń"></tr>
							</form>
						</td>
					</tbody>
					<div class="modal fade bs-example-modal-sm" id="changeAmount{{$baskets->id}}" tabindex="-1" role="dialog" >
							<div class="modal-dialog modal-lg" role="document">
								<div class="container">
									<div class="row">
										<div class="col-md-8">
										       <div class="panel panel-default">
											       <div class="panel-heading">Zmień ilosc</div>
											       <div class="panel-body">
														<form method="POST" action="/koszyk/changeAmount/{{$baskets->id}}">
															{!! csrf_field() !!}
															<input name="amount">
															<input type="submit" value="Zmień">
														</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					@endforeach	
				</table>
					</div>	
			<form method="POST" action="/transakcja">
				{!! csrf_field() !!}
			<input type="submit" value="Zrealizuj"></tr>
			</form>	
		@endif
		
	</div>
@else
@endif
</div>

				
@endsection
