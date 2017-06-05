@extends('layouts.app')


@section('content')

	<div class ="container">
			<div class ="row">
				<div class="col-md-12">
					<center>
						@foreach($products as $item)
				 		<div class="col-md-3">
					 		<div id="product">
					 		
					 			<img id="imageProduct" src="{{route('getPhotohomePage', ['photo'=> $item->id])}}.jpg"><br>
					 			<div id="productBottom">
	              					<b>{{ $item->product }}</b>
	              					<hr>
	                            	{{ $item->kind}} <br>
	                                Sprzedanych: {{ $item->buy_amount }} szt<br>
	                                @if($item->amount > 0)
										@if($item->promotion = 'Tak' && $item->percent_promotion != 0 && isset($item->text_promotion))
											Nowa Cena: {{ $item->price-($item->price*2)/100  }} zł <br> Stara Cena: {{ $item->price }} zł
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
									<br><a href="{{route('showProduct',['id'=>$item->id])}}">Zamów produkt</a>
								</div>
			                 </div>
	     				</div>
						@endforeach
					</center>
					</div>
				</div>
	 </div> 
@endsection