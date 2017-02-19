<!-- dziedziczy po layout -->
@extends('layouts.app')





	


<!-- umieszczamy tekst, który chcemy mieć w divie kontent -->
@section('content')

<div class ="col-md-10">
	@foreach($products as $item)

		 

					<div class="col-md-3 item-grid simpleCart_shelfItem">
					<div id="content2">
					<td><a href="pokaz_produkt/{{$item->id}}"></td>
					<span>
			
					<img  height="250px" width="100%" src="zdjecia/{{$item->id}}.jpg" />
								
						
					</div>
					<div class="product_bottom">
						<div class="rodzaj">{{ $item->kind}} </div>
							<font color=\"F23340\"><b>{{ $item->product }}</b></font><br>
					Sprzedanych: {{ $item->buy_amount }} szt
					@if($item->amount > 0)
					
						@if($item->promotion = 'Tak' && $item->percent_promotion != 0 && isset($item->text_promotion))
						
							<div class="new_price">{{ $item->price-($item->price*2)/100  }} zł</div><div class="old_price"> {{ $item->price }} zł</div>
						
						@elseif($item->promotion = 'Tak' && !empty($item->text_promotion) && $item->percent_promotion==0)
						
						
							<div class="price">{{ $item->price }} zł</div><br>
							<div class="promocja">PROMOCJA</div>
						
						@elseif($item->promotion = 'Tak' && $item->percent_promotion!=0 && !empty($item->text_promotion))
						
							<div class="new_price">{{ $item->promo }} zł</div><div class="old_price"> {{ $item->price }} zł</div>
						
						@elseif ($item->promotion = 'Nie')
						
							<div class="price">{{ $item->price }} zł</div><br>
							
						@endif						
					@else
						
							<div id="wyprzedano"><img src="wyprzedano.png" alt="wyprzedano"></div>
						
					@endif
					</a>	
					</div>
					</div>
	@endforeach

@endsection