@extends('layouts.admin')
@section('content')
<div class="row">
   	
   <div class="col-md-8 col-md-offset-3">
      	
      	
      	    <form enctype="multipart/form-data" method="POST" action="/admin/add_product/store">
	      	{!! csrf_field() !!}
	      	<div class="col-md-3">
		      	Nazwa Produktu:
					<input style="width:150px" id="product" type="text" class="form-control" name="produkt">
				Cena:
					<input style="width:150px" id="price" type="text" class="form-control" name="cena">
				Ilość:
					<input style="width:150px" id="amount" type="text" class="form-control" name="ilosc"">
			</div>
			<div class="col-md-3">
				Rodzaj:
					<input style="width:150px" id="kind" type="text" class="form-control" name="rodzaj">
				Przeznaczenie:
					<input style="width:150px" id="appropriaton" type="text" class="form-control" name="przeznaczenie">
				Wymiary Ogólne:
					<input style="width:150px" id="general_size" type="text" class="form-control" name="wymiary_ogolne">
				Wymiary:
					<input style="width:150px" id="size" type="text" class="form-control" name="wymiary">
			</div>
			<div class="col-md-3">
				Promocja:
					<input style="width:150px" id="promotion" type="text" class="form-control" name="promocja">
				Procent promocji:
					<input style="width:150px" id="percent_promotion" type="text" class="form-control" name="procent_promocji">
				Tekst promocji:
					<input style="width:150px" id="text_promotion" type="text" class="form-control" name="tekst_promocji">
			
				</div>
		</div>
</div>
	{!! Form::file('image') !!}
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			Opis:
				<input id="desc" type="textarea" class="form-control" name="opis">
			<input type="submit" value="Dodaj"></tr>
		</div>

	</div>


@endsection