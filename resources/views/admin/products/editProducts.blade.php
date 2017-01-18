@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-8 col-md-offset-2">
    <div class="thumbnail">
      <div class="caption">
      	<div class="col-md-offset-4">
      	@foreach($items as $item)
      	    <form method="POST" action="/admin/edit_product/update/{{$item->id}}">
	      	{!! csrf_field() !!}
	      	Nazwa Produktu:
				<input style="width:150px" id="product" type="text" class="form-control" name="product" value="{{$item->produkt}}">
			Wymiary:
				<input style="width:150px" id="size" type="text" class="form-control" name="size" value="{{$item->wymiary}}">
			Cena:
				<input style="width:150px" id="price" type="text" class="form-control" name="price" value="{{$item->cena}}">
			Rodzaj:
				<input style="width:150px" id="kind" type="text" class="form-control" name="kind" value="{{$item->rodzaj}}">
			Przeznaczenie:
				<input style="width:150px" id="appropriaton" type="text" class="form-control" name="appropriaton" value="{{$item->przeznaczenie}}">
			Wymiary Ogólne:
				<input style="width:150px" id="general_size" type="text" class="form-control" name="general_size" value="{{$item->wymiary_ogolne}}">
			Ilość:
				<input style="width:150px" id="amount" type="text" class="form-control" name="amount" value="{{$item->ilosc}}">
			Promocja:
				<input style="width:150px" id="promotion" type="text" class="form-control" name="promotion" value="{{$item->promocja}}">
			Procent promocji:
				<input style="width:150px" id="percent_promotion" type="text" class="form-control" name="percent_promotion" value="{{$item->procent_promocji}}">
			Tekst promocji:
				<input style="width:150px" id="text_promotion" type="text" class="form-control" name="text_promotion" value="{{$item->tekst_promocji}}">
			Opis:
				<input style="width:150px" id="desc" type="textarea" class="form-control" name="desc" value="{{$item->opis}}">
			<input type="submit" value="Dodaj"></tr>
		@endforeach
      	</div>
      </div>
    </div>
  </div>

</div>


@endsection