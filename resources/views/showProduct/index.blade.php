@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div  class="panel panel-default">
			<div class="panel-body text-center">
			<div id="galeria"></div>	
					<?php 
					$zdjecie=$items->id;
					$katalog = "pokaz_produkt/miniaturki/$zdjecie";
					$katalogminiaturki = "pokaz_produkt/miniaturki/$zdjecie";
					$galeria = opendir( $katalog );
					while ( $zdjecie = readdir( $galeria ) )
					{

						$odczyt = pathinfo( $katalog.'/'.$zdjecie );
						if ( $odczyt['extension']  == 'jpg' )
						{

							echo '<a href="/'.$katalog.'/'.$zdjecie.'" class="highslide" onclick="return hs.expand(this)" title="Zdjęcie: '.$zdjecie.'"><img width="200" height="133" src="/'.$katalogminiaturki.'/'.$zdjecie.'" alt="Zdjęcie: '.$zdjecie.'" /></a>';
						}

					}
					closedir($galeria);
				?>	
				<div class="col-md-6 col-md-offset-3">
				@if(Auth::check())
					@if($items->amount > 0)
					@if($items->promotion = 'Tak' && $items->percent_promotion != 0 && isset($items->text_promotion))
							<div class="new_price">{{ $items->price-($items->price*2)/100  }} zł</div>
						@elseif($items->promotion = 'Tak' && !empty($items->text_promotion) && $items->percent_promotion==0)
							{{ $items->price }} zł
							<div class="promocja">PROMOCJA</div>
						@elseif($items->promotion = 'Tak' && $items->percent_promotion!=0 && !empty($items->text_promotion))
							{{ $items->price }} zł
						@elseif ($items->promotion = 'Nie')
							{{ $items->price }} zł
					@endif				
					<form method="post" action="/koszyk/store">
						{!! csrf_field() !!}
						<input hidden name="product" value="{{$items->product}}"></td></tr>
						<input hidden name="price" value="{{$items->price}}"></td></tr>
						<input hidden name="id_product" value="{{$items->id}}"></td></tr>
						<input for="amount" maxlength="3" type="text" name="amount" required></td></tr>
						<input type="submit" value="Do koszyka!"><br></tr>
						<div id="galeria"></div>	
					</form>
					@else
						Tego produktu aktualnie nie ma w magazynie
					@endif
				@else
					@if($items->amount > 0)
					Ilosc:
					<form method="post" action="/koszyk_goscia/{{$items->id}}">
					{!! csrf_field() !!}
					<input type="hidden" name="random_id_product" value='<?php echo rand(0, 1000000); ?>'>
					<input for="amount" maxlength="3" type="text" name="amount" required></td></tr>
					<input type="submit" value="Do koszyka!"><br></tr>
					@else
						Tego produktu aktualnie nie ma w magazynie
					@endif
				@endif
				<h3>{!!$items->desc!!}</h3>
				</div>
			</div>
		</div>
	</div>
</div>




@endsection
