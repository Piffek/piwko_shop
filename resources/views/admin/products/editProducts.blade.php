@extends('layouts.admin')
@section('content')
<div class="row">


<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Edytuj zdjęcia</button>
		

      	
      	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
      	
      	<div class="row">
      		<div class="col-md-1 col-md-offset-2">
	      		<div style="width:300px" class="panel panel-default">
	      			<div class="panel-body">
			      		<form method="POST" action="/admin/edit_products/add_photo" enctype="multipart/form-data">
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

  
      		<div class="col-md-1 col-md-offset-4">
	      		<div style="width:300px" class="panel panel-default">
	      			<div class="panel-body">
			      		<form action="{{ url('/admin/edit_products/add_photo_gallery') }}" enctype="multipart/form-data" method="POST">
			      			{!! csrf_field() !!}
							Galeria zdjęć przedmiotu<br>
							<input type="hidden" class="form-control" name="id" value="{{$item->id}}">
						
								@foreach (File::allFiles(public_path().'/pokaz_produkt/miniaturki/'.$item->id.'/') as $file)
								  <img  height="250px" width="250px" src="/pokaz_produkt/miniaturki/{{$item->id}}/{{$file->getRelativePathName() }}" />		
								<a href="{{url('/admin/edit_products/delete_photo_gallery/'.$item->id.'/'.$file->getRelativePathName().'')}}" class="btn btn-danger" role="button">Usuń</a>
								@endforeach
						
							{!! Form::file('image') !!}
							
							<input type="submit" value="Dodaj Zdjęcie" class="btn btn-success"></tr>
						</form>
					</div>
				</div>
			</div>
			</div>
      	
     </div>
</div>  	
      	
   <div class="col-md-8 col-md-offset-3">
      	
      	
      	    <form method="POST" action="/admin/edit_product/update/{{$item->id}}">
	      	{!! csrf_field() !!}
	      	<div class="col-md-3">
		      	Nazwa Produktu:
					<input style="width:150px" id="product" type="text" class="form-control" name="product" value="{{$item->product}}">
				Cena:
					<input style="width:150px" id="price" type="text" class="form-control" name="price" value="{{$item->price}}">
				Ilość:
					<input style="width:150px" id="amount" type="text" class="form-control" name="amount" value="{{$item->amount}}">
			</div>
			<div class="col-md-3">
				Rodzaj:
					<input style="width:150px" id="kind" type="text" class="form-control" name="kind" value="{{$item->kind}}">
				Przeznaczenie:
					<input style="width:150px" id="appropriaton" type="text" class="form-control" name="intended" value="{{$item->intended}}">
				Wymiary Ogólne:
					<input style="width:150px" id="general_size" type="text" class="form-control" name="general_size" value="{{$item->general_size}}">
				Wymiary:
					<input style="width:150px" id="size" type="text" class="form-control" name="size" value="{{$item->size}}">
			</div>
			<div class="col-md-3">
				Promocja:
					<input style="width:150px" id="promotion" type="text" class="form-control" name="promotion" value="{{$item->promotion}}">
				Procent promocji:
					<input style="width:150px" id="percent_promotion" type="text" class="form-control" name="percent_promotion" value="{{$item->percent_promotion}}">
				Tekst promocji:
					<input style="width:150px" id="text_promotion" type="text" class="form-control" name="text_promotion" value="{{$item->text_promotion}}">
			
				</div>
		</div>
</div>
	
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			Opis:
			<textarea class="desc" name="desc" >{{$item->desc}}</textarea>
			<input type="submit" value="Edytuj"></tr>
		</div>

	</div>



@endsection