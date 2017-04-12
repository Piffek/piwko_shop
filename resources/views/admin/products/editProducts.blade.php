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
	      				{!! Form::open(['route' => 'addPhotoDuringEdit', 'files' => true]) !!}
			      			{!! csrf_field() !!}
							Zdjęcie tego przedmiotu<br>
							{!!Form::hidden('id',$item->id) !!}
							@if(file_exists(public_path().'/zdjecia/'.$item->id.'.jpg' ))
									<img  height="250px" width="250px"  src="{{route('getPhotohomePage', ['photo'=> $item->id])}}.jpg" >
							@endif
							{!! Form::file('image') !!}
							<a href="{{route('adminDeletePhoto', ['id'=>$item->id])}}" class="btn btn-danger" role="button">Usuń</a>
							{!! Form::submit('Dodaj') !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>

  
      		<div class="col-md-1 col-md-offset-4">
	      		<div style="width:300px" class="panel panel-default">
	      			<div class="panel-body">
	      				{!! Form::open(['route' => 'editPhotoGalleryDuringEdit', 'files' => true]) !!}
							Galeria zdjęć przedmiotu<br>
							{!! Form::hidden('id', $item->id) !!}
								@foreach (File::allFiles(public_path().'/pokaz_produkt/miniaturki/'.$item->id.'/') as $file)
								  <img  height="250px" width="250px" src="/pokaz_produkt/miniaturki/{{$item->id}}/{{$file->getRelativePathName() }}" />		
								<a href="{{route('deletePhotoGalleryDuringEdit', ['id'=>$item->id, 'file'=>$file->getRelativePathName()])}}" class="btn btn-danger" role="button">Usuń</a>
								@endforeach
							{!! Form::file('image') !!}
							{!! Form::submit('Dodaj') !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			</div>
      	
     </div>
</div>  	
      	
   <div class="col-md-8 col-md-offset-3">
      	
      		{!! Form::open(['route' => ['adminEditProductUpdate', $item->id ]]) !!}
	      	<div class="col-md-3">
	      		{!! Form::label('Nazwa Produktu') !!}<br>
				{!! Form::text('product', $item->product) !!}<br>
				{!! Form::label('Cena') !!}<br>
				{!! Form::text('price', $item->price) !!}<br>
				{!! Form::label('Ilosc') !!}<br>
				{!! Form::text('amount',$item->amount) !!}<br>
			</div>
			<div class="col-md-3">
				Rodzaj:
				<select name="kind">
				  <option value="{{$item->kind}}">{{$item->kind}}</option>
					@foreach($kinds as $kind)
					  <option value="{{$kind->name}}">{{$kind->name}}</option>
					@endforeach
				</select><br>
   				{!! Form::label('Przeznaczenie') !!}<br>
				{!! Form::text('intended', $item->intended) !!}<br>
				{!! Form::label('Wymiary Ogólne') !!}<br>
				{!! Form::text('general_size', $item->general_size) !!}<br>
				{!! Form::label('Wymiary') !!}<br>
				{!! Form::text('size', $item->size) !!}<br>
			</div>
			<div class="col-md-3">
				{!! Form::label('Promocja') !!}<br>
				{!! Form::text('promotion',$item->promotion) !!}<br>
				{!! Form::label('Procent Promocji') !!}<br>
				{!! Form::text('percent_promotion',$item->percent_promotion) !!}<br>
				{!! Form::label('Tekst Promocji') !!}<br>
				{!! Form::text('text_promotion',$item->text_promotion) !!}<br>
				</div>
		</div>
</div>
	
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				{!! Form::label('Opis') !!}<br>
				{!! Form::text('desc',$item->desc) !!}<br>
		</div>

	</div>
				{!! Form::submit('Edytuj') !!}
			{!! Form::close() !!}


@endsection