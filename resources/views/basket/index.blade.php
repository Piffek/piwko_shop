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
							<a href="{{route('basketDestroy',['id'=>$baskets->id]) }}">Usuń</a>
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
												       	{!! Form::open(['route' => ['changeAmount', $baskets->id ]]) !!}
															{!! Form::label('Ilosc') !!}
															{!! Form::text('amount') !!}
															{!! Form::submit('Zmień') !!}
														{!! Form::close() !!}
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
			<a href="{{route('transaction')}}">Zrealizuj</a>
			</form>	
		@endif
		
	</div>
@else
@endif
</div>

				
@endsection
