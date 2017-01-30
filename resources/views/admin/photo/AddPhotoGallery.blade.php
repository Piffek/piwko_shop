@extends('layouts.admin')
@section('content')


	  	@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif





	
		
				
			
		
			<a href="/pokaz_produkt/miniaturki/{{$photo_id}}/{{$imageName}}" class="highslide" onclick="return hs.expand(this)" title="Zdjęcie: {{$imageName}}"><img width="200" height="133" src="/pokaz_produkt/miniaturki/{{$photo_id}}/{{$imageName}}" alt="Zdjęcie: {{$imageName}}" /></a>
			
		
		

	


	

		<form action="{{ url('/admin/add_product/photo') }}" enctype="multipart/form-data" method="POST">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-12">
				<input hidden style="width:150px" id="size" type="text" class="form-control" name="photo_id" value="{{$photo_id}}">
					<input type="file" name="image" />
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-success">Dodaj</button>
				</div>
			</div>
		</form>

@endsection