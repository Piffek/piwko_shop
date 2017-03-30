@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel-body text-center">
			@if(isset($imageName))
				<a href="/pokaz_produkt/miniaturki/{{$photo_id}}/{{$imageName}}" class="highslide" onclick="return hs.expand(this)" title="Zdjęcie: {{$imageName}}"><img width="200" height="133" src="/pokaz_produkt/miniaturki/{{$photo_id}}/{{$imageName}}" alt="Zdjęcie: {{$imageName}}" /></a>
			@else
				Proszę wybrać zdjęcie do galerii
			@endif
			<form action="{{ url('/admin/add_product_gallery/photo') }}" enctype="multipart/form-data" method="POST">
				{{ csrf_field() }}
				<input id="size" type="hidden" class="form-control" name="photo_id" value="{{$photo_id}}">
				<input type="file" name="image" />
				<button type="submit" class="btn btn-success">Dodaj</button>
			</form>
		</div>
	</div>
</div>



@endsection
