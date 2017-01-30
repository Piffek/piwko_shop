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
			<input style="width:150px" id="product" type="text" class="form-control" name="product">
		Wymiary:
			<input style="width:150px" id="size" type="text" class="form-control" name="size">
		Cena:
			<input style="width:150px" id="price" type="text" class="form-control" name="price">
		Rodzaj:
			<input style="width:150px" id="kind" type="text" class="form-control" name="kind" >
		Przeznaczenie:
			<input style="width:150px" id="appropriaton" type="text" class="form-control" name="appropriaton">
		Wymiary Ogólne:
			<input style="width:150px" id="general_size" type="text" class="form-control" name="general_size">
		Ilość:
			<input style="width:150px" id="amount" type="text" class="form-control" name="amount">
		Promocja:
			<input style="width:150px" id="promotion" type="text" class="form-control" name="promotion">
		Procent promocji:
			<input style="width:150px" id="percent_promotion" type="text" class="form-control" name="percent_promotion">
		Tekst promocji:
			<input style="width:150px" id="text_promotion" type="text" class="form-control" name="text_promotion">
		Opis:
			<input style="width:150px" id="desc" type="textarea" class="form-control" name="desc">
		{!! Form::file('image') !!}
        <input type="submit" value="Dodaj"></tr>
      	</div>
      </div>
    </div>
  </div>

</div>


@endsection