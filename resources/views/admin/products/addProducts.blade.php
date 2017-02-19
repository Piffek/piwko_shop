@extends('layouts.admin')
@section('content')
<div class="row">
   	
   <div class="col-md-8 col-md-offset-3">
      	
      	
      	    <form enctype="multipart/form-data" method="POST" action="/admin/add_product/store">
	      	{!! csrf_field() !!}
	      	<div class="col-md-3">
		      	Nazwa Produktu:
					<input style="width:150px" id="product" type="text" class="form-control" name="product">
				Cena:
					<input style="width:150px" id="price" type="text" class="form-control" name="price">
				Ilość:
					<input style="width:150px" id="amount" type="text" class="form-control" name="amount">
			</div>
			<div class="col-md-3">
				Rodzaj:
					<input style="width:150px" id="kind" type="text" class="form-control" name="kind">
				Przeznaczenie:
					<input style="width:150px" id="appropriaton" type="text" class="form-control" name="intended">
				Wymiary Ogólne:
					<input style="width:150px" id="general_size" type="text" class="form-control" name="general_size">
				Wymiary:
					<input style="width:150px" id="size" type="text" class="form-control" name="size">
			</div>
			<div class="col-md-3">
				Promocja:
					<input style="width:150px" id="promotion" type="text" class="form-control" name="promotion">
				Procent promocji:
					<input style="width:150px" id="percent_promotion" type="text" class="form-control" name="percent_promotion">
				Tekst promocji:
					<input style="width:150px" id="text_promotion" type="text" class="form-control" name="text_promotion">
			
				</div>
		</div>
</div>
	{!! Form::file('image') !!}
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			Opis:
				<input id="desc" type="textarea" class="form-control" name="desc">
			<input type="submit" value="Dodaj"></tr>
		</div>

	</div>


@endsection