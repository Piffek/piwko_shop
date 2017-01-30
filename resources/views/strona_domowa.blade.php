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
						<div class="rodzaj">{{ $item->rodzaj}} </div>
							<font color=\"F23340\"><b>{{ $item->produkt }}</b></font><br>
					Sprzedanych: {{ $item->zakupienia }} szt
					@if($item->ilosc > 0)
					
						@elseif($item->promocja === Tak AND $item->procent_promocji != 0 AND isset($item->tekst_promocji))
						
							<div class="new_price">{{ $item->cena-($item->cena*2)/100  }} zł</div><div class="old_price"> {{ $item->cena }} zł</div>
						
						@elseif($item->promocja == Tak AND !empty($item->tekst_promocji) AND $item->procent_promocji==0)
						
						
							<div class="price">{{ $item->cena }} zł</div><br>
							<div class="promocja">PROMOCJA</div>
						
						@elseif($item->promocja == Tak AND $item->procent_promocji!=0 AND !empty($item->tekst_promocji))
						
							<div class="new_price">{{ $item->promo }} zł</div><div class="old_price"> {{ $item->cena }} zł</div>
						
						@elseif ($item->promocja === Nie)
						
							<div class="price">{{ $item->cena }} zł</div><br>
						
					@else
						
							<div id="wyprzedano"><img src="wyprzedano.png" alt="wyprzedano"></div>
						
					@endif
					</a>	
					</div>
					</div>
	@endforeach

@endsection