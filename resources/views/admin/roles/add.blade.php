@extends('layouts.admin')
@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Edytuj role</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="panel panel-info">
				<div class="panel-heading">
				    @foreach($roles as $role)
					    {!! Form::open(['route' => ['adminEditRole', $role->id ]]) !!}
					    	 {!!Form::label('Nazwa') !!}<br>
						     {!!Form::text('name',$role->name )!!}
						     {!! Form::submit('Zapisz') !!}
						{!! Form::close() !!}
						<a href="{{route('adminDeleteRole',['id'=>$role->id])}}" class="btn btn-danger">Usuń</a>
				     @endforeach
			</div>
		</div>
	</div>
  </div>
</div>



<div class="row">
	<div class ="col-md-3 col-md-offset-4">
		<div class="panel panel-info">
			<div class="panel-heading"><h3 class="panel-title">Dodaj nowa role</h3> </div>
			   	{!! Form::open(['route' => 'adminAddRole']) !!}
			   		{!!Form::label('Nazwa') !!}<br>
			   		{!!Form::text('name')!!}
			     	{!! Form::submit('Zapisz',['class'=>'form-control']) !!}
				{!! Form::close() !!}
	      		</div>
	    	</div>
	</div>
</div>


@endsection
