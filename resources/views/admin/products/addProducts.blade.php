@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-8 col-md-offset-2">
    <div class="thumbnail">
      <div class="caption">
      	<div class="col-md-offset-4">
      	
  	
      	
      	<form method="POST" action="/admin/add_product/store" enctype="multipart/form-data">
      	{!! csrf_field() !!}
      	Nazwa Produktu:
			<input style="width:150px" id="produkt" type="text" class="form-control" name="produkt">
		Wymiary:
			<input style="width:150px" id="size" type="text" class="form-control" name="wymiary">
		Cena:
			<input style="width:150px" id="price" type="text" class="form-control" name="cena">
		Rodzaj:
			<input style="width:150px" id="kind" type="text" class="form-control" name="rodzaj" >
		Przeznaczenie:
			<input style="width:150px" id="appropriaton" type="text" class="form-control" name="przeznaczenie">
		Wymiary Ogólne:
			<input style="width:150px" id="general_size" type="text" class="form-control" name="wymiary_ogolne">
		Ilość:
			<input style="width:150px" id="amount" type="text" class="form-control" name="ilosc">
		Promocja:
			<input style="width:150px" id="promotion" type="text" class="form-control" name="promocja">
		Procent promocji:
			<input style="width:150px" id="percent_promotion" type="text" class="form-control" name="procent_promocji">
		Tekst promocji:
			<input style="width:150px" id="text_promotion" type="text" class="form-control" name="tekst_promocji">
		Opis:
			<input style="width:150px" id="desc" type="textarea" class="form-control" name="opis">
		{!! Form::file('image') !!}
        <input type="submit" value="Dodaj"></tr>
      	</div>
      </div>
    </div>
  </div>

</div>


@endsection