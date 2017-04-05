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
			{!! Form::open(['route' => 'addPhotoGallery', 'files' => true]) !!}
				{!! Form::hidden('photo_id', $photo_id) !!}
				{!! Form::file('image') !!}
				{!! Form::submit('Dodaj') !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>



@endsection
