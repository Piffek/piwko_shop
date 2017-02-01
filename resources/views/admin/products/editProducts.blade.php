@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-3">


		

      	
      	
      	
      	<div class="row">
      		<div class="col-md-3">
	      		<div style="width:300px" class="panel panel-default">
	      			<div class="panel-body">
			      		<form method="POST" action="/admin/add_photo" enctype="multipart/form-data">
			      			{!! csrf_field() !!}
							Zdjęcie tego przedmiotu<br>
							<input type="hidden" class="form-control" name="id" value="{{$item->id}}">
							@if(file_exists(public_path().'/zdjecia/'.$item->id.'.jpg' ))
								<img  height="250px" width="250px" src="/zdjecia/{{$item->id}}.jpg" />
							@endif
							{!! Form::file('image') !!}
							<a href="{{url('/admin/delete_photo/'.$item->id.'')}}" class="btn btn-danger" role="button">Usuń</a>
							<input type="submit" value="Dodaj Zdjęcie" class="btn btn-success"></tr>
						</form>
					</div>
				</div>
			</div>
		</div>
      	
      	
      	
      	
      	
      	
      	
      	
      	    <form method="POST" action="/admin/edit_product/update/{{$item->id}}">
	      	{!! csrf_field() !!}
	      	<div class="col-md-3">
		      	Nazwa Produktu:
					<input style="width:150px" id="product" type="text" class="form-control" name="product" value="{{$item->produkt}}">
				Cena:
					<input style="width:150px" id="price" type="text" class="form-control" name="price" value="{{$item->cena}}">
				Ilość:
					<input style="width:150px" id="amount" type="text" class="form-control" name="amount" value="{{$item->ilosc}}">
			</div>
			<div class="col-md-3">
				Rodzaj:
					<input style="width:150px" id="kind" type="text" class="form-control" name="kind" value="{{$item->rodzaj}}">
				Przeznaczenie:
					<input style="width:150px" id="appropriaton" type="text" class="form-control" name="appropriaton" value="{{$item->przeznaczenie}}">
				Wymiary Ogólne:
					<input style="width:150px" id="general_size" type="text" class="form-control" name="general_size" value="{{$item->wymiary_ogolne}}">
				Wymiary:
					<input style="width:150px" id="size" type="text" class="form-control" name="size" value="{{$item->wymiary}}">
			</div>
			<div class="col-md-3">
				Promocja:
					<input style="width:150px" id="promotion" type="text" class="form-control" name="promotion" value="{{$item->promocja}}">
				Procent promocji:
					<input style="width:150px" id="percent_promotion" type="text" class="form-control" name="percent_promotion" value="{{$item->procent_promocji}}">
				Tekst promocji:
					<input style="width:150px" id="text_promotion" type="text" class="form-control" name="text_promotion" value="{{$item->tekst_promocji}}">
			
				</div>
		</div>
</div>
	
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			Opis:
				<input id="desc" type="textarea" class="form-control" name="desc" value="{{$item->opis}}">
			<input type="submit" value="Dodaj"></tr>
		</div>

	</div>



@endsection