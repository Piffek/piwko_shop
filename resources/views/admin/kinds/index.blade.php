@extends('layouts.admin')
@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Edytuj kategorie</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="panel panel-info">
		<div class="panel-heading">
		    @foreach($kinds as $kind)
		    	{!! Form::open(['route' => ['editKind', $kind->id ]]) !!}
					{!! Form::label('Nazwa') !!}<br>
					{!! Form::text('name',$kind ->name ) !!}<br>
				  	{!! Form::submit('Zapisz',['class'=>'btn btn-success']) !!}
				  <a href="{{route('adminDeleteKind',['id'=>$kind->id])}}" class="btn btn-danger">Usuń</a><br>
				  {!! Form::close() !!}
		     @endforeach
    		 </div>
     	</div>
    </div>
  </div>
</div>



<div class="row">
	<div class ="col-md-3 col-md-offset-4">
		<div class="panel panel-info">
			<div class="panel-heading"> 
				<h3 class="panel-title">Dodaj nowa kategorie</h3> </div>
				{!! Form::open(['route' => 'addKind']) !!}
					{!! Form::label('Nazwa') !!}
					{!! Form::text('name') !!}<br>
					{!! Form::submit('Zapisz') !!}
				{!! Form::close() !!}
			</div>
		</div>
	 </div>
</div>


@endsection
