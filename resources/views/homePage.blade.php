<!-- dziedziczy po layout -->
@extends('layouts.onlyBaseLayout')





	


<!-- umieszczamy tekst, który chcemy mieć w divie kontent -->
@section('content')

	<div class="row">
	<div class="col-md-6 col-md-offset-2">
	@foreach($products as $item)
		 <div class="col-md-3">

                                            <div class="general-posts" >
                                                <div class="user-info" style="height:20%">
                                                    {{ $item->product }}
                                                     
                                                    <p class="no-space">
                                                    <img src="zdjecia/{{$item->id}}.jpg"  alt="">
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
													</p>
                                                 </div>
                                                 <div class="read-more">
                                                    <a href="pokaz_produkt/{{$item->id}}">Zamów produkt<i class="fw-icon-arrow-right"></i></a>
                                                 </div>
                                            </div>
                                     

                                
                             
      </div> 
	@endforeach
	</div>
	            @include('partials._menu_left')  

@endsection