@extends('layouts.app')





@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<div class="col-md-6 col-md-offset-3">
					<h1>{{$items->produkt}}</h1>
					<h2>{{$items->cena}}</h1>
					<h3>{{$items->opis}}</h1>
@if(Auth::check())
					Ilosc:
					<form method="post" action="/koszyk/store">
					{!! csrf_field() !!}
					<input hidden name="product" value="{{$items->produkt}}"></td></tr>
					<input hidden name="cena" value="{{$items->cena}}"></td></tr>
					<input hidden name="id_produktu" value="{{$items->id}}"></td></tr>
					<input hidden name="id_user" value="{{$koszyk}}"></td></tr>
					<input for="ilosc" maxlength="3" type="text" name="ilosc" required></td></tr>
					<input type="submit" value="Do koszyka!"><br></tr>
						<div id="galeria"></div>	
@else
					Ilosc:
					<form method="post" action="/koszyk_goscia/{{$items->id}}">
					{!! csrf_field() !!}
					<input type="hidden" name="random_id_product" value='<?php echo rand(0, 1000000); ?>'>
					<input for="ilosc" maxlength="3" type="text" name="ilosc" required></td></tr>
					<input type="submit" value="Do koszyka!"><br></tr>
@endif
						<div id="galeria"></div>	
							<?php 
							$zdjecie=$items->id;
							$min = 'min';
							$katalog = "obrazki/$zdjecie";
							$katalogminiaturki = "obrazki/$zdjecie$min";
							$galeria = opendir( $katalog );
							while ( $zdjecie = readdir( $galeria ) )
							{
									
								$odczyt = pathinfo( $katalog.'/'.$zdjecie );
								if ( $odczyt['extension']  == 'jpg' )
								{
							
									echo '<a href="'.$katalog.'/'.$zdjecie.'" class="highslide" onclick="return hs.expand(this)" title="Zdjęcie: '.$zdjecie.'"><img width="200" height="133" src="'.$katalogminiaturki.'/'.$zdjecie.'" alt="Zdjęcie: '.$zdjecie.'" /></a>';
								}
							
							}
							closedir($galeria);
						?>	
				</div>
			</div>
		</div>
	</div>
</div>




@endsection