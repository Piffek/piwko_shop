@extends('layouts.app')





@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<div class="col-md-6 col-md-offset-3">
					<h1>{{$items->product}}</h1>
					<h2>{{$items->price}}</h1>
					<h3>{{$items->desc}}</h1>
@if(Auth::check())
					Ilosc:
					<form method="post" action="/koszyk/store">
					{!! csrf_field() !!}
					<input hidden name="product" value="{{$items->product}}"></td></tr>
					<input hidden name="price" value="{{$items->price}}"></td></tr>
					<input hidden name="id_product" value="{{$items->id}}"></td></tr>
					<input hidden name="id_user" value="{{$koszyk}}"></td></tr>
					<input for="amount" maxlength="3" type="text" name="amount" required></td></tr>
					<input type="submit" value="Do koszyka!"><br></tr>
						<div id="galeria"></div>	
@else
					Ilosc:
					<form method="post" action="/koszyk_goscia/{{$items->id}}">
					{!! csrf_field() !!}
					<input type="hidden" name="random_id_product" value='<?php echo rand(0, 1000000); ?>'>
					<input for="amount" maxlength="3" type="text" name="amount" required></td></tr>
					<input type="submit" value="Do koszyka!"><br></tr>
@endif
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
				</div>
			</div>
		</div>
	</div>
</div>




@endsection