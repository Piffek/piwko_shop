@extends('layouts.app')


@section('content')

	<div class ="container">
			<div class ="row">
				<div class="col-md-12">
					@foreach($products as $item)
			 		<div class="col-md-3">
				 		<div id="product">
				 		
				 			<img id="imageProduct" src="{{route('getPhotohomePage', ['photo'=> $item->id])}}.jpg"><br>
		              		{{ $item->product }}
		                            	{{ $item->kind}} <br>
		                                Sprzedanych: {{ $item->buy_amount }} szt<br>
		                                @if($item->amount > 0)
											@if($item->promotion = 'Tak' && $item->percent_promotion != 0 && isset($item->text_promotion))
												<div class="new_price">{{ $item->price-($item->price*2)/100  }} zł</div><div class="old_price"> {{ $item->price }} zł</div>
											@elseif($item->promotion = 'Tak' && !empty($item->text_promotion) && $item->percent_promotion==0)
												{{ $item->price }} zł
												<div class="promocja">PROMOCJA</div>
											@elseif($item->promotion = 'Tak' && $item->percent_promotion!=0 && !empty($item->text_promotion))
												Z {{ $item->price }} zł na {{ $item->promo }} zł 
											@elseif ($item->promotion = 'Nie')
												{{ $item->price }} zł
											@endif						
										@else
											Wyprzedano
										@endif
				 					<a href="{{route('showProduct',['id'=>$item->id])}}">Zamów produkt</a>
		                 </div>
     				</div>
					@endforeach
					</div>
				</div>
	 </div> 
@endsection