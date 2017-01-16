<!-- dziedziczy po layout -->
@extends('layouts.app')





	


<!-- umieszczamy tekst, który chcemy mieć w divie kontent -->
@section('content')
<div class ="col-md-10">
	@foreach($products as $item)
	
	@PHP

	$promo = $item->cena-($item->cena*$item->cena/100);
					echo '<div class="col-md-3 item-grid simpleCart_shelfItem">	';
					echo '<div id="content2">';	
					echo '<td><a href="pokaz_produkt/'.$item->id.'"></td>';
					echo '<span>';
						$zdjecie=$item->id;
							$katalog = "zdjecia/$zdjecie";
							$galeria = opendir( $katalog );
							while ( $zdjecie = readdir( $galeria ) )
							{
								$odczyt = pathinfo( $katalog.'/'.$zdjecie );
								if ( $odczyt['extension']  == 'jpg' )
								{
									echo'<img  height="250px" width="100%" src="'.$katalog.'/'.$zdjecie.'"/>';
								}
							}
							closedir($galeria);
						
					echo '</div>';
					echo '<div class="product_bottom">';
					echo '<div class="rodzaj">'.$item->rodzaj.'</div>';
					echo '<font color=\"F23340\"><b>'.$item->produkt.'</b></font><br>';
					echo 'Sprzedanych: '.$item->zakupienia.' szt';
					if($item->ilosc>0)
					{
						if($item->promocja == 'Tak' AND $item->procent_promocji!=0 AND empty($item->tekst_promocji))
						{
							echo '<div class="new_price">'.$promo.' zł</div><div class="old_price"> '.$cena.' zł</div>';
						}
						else if($item->promocja == 'Tak' AND !empty($item->tekst_promocji) AND $item->procent_promocji==0)
						{
							//echo '<div id="promocja"><img src="promocja.png" alt="promocja"></div>';
							echo '<div class="price">'.$item->cena.'zł</div><br>';
							echo '<div class="promocja">PROMOCJA</div>';
						}
						else if($item->promocja == 'Tak' AND $item->procent_promocji!=0 AND !empty($item->tekst_promocji))
						{
							//echo '<div id="promocja"><img src="promocja.png" alt="promocja"></div>';
							echo '<div class="new_price">'.$item->promo.' zł</div><div class="old_price"> '.$item->cena.' zł</div>';
						}
						else if($item->promocja == 'Nie')
						{
							echo '<div class="price">'.$item->cena.' zł</div><br>';
						}
						}else
						{
							echo '<div id="wyprzedano"><img src="wyprzedano.png" alt="wyprzedano"></div>';
						}

					echo '</a>';		
					echo '</div>';
					echo '</div>';
				@ENDPHP
			@endforeach

@endsection