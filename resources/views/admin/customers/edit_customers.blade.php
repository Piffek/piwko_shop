@extends('layouts.admin')
@section('content')
<div class="row">
@foreach($users as $user)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
 		Imię i nazwisko: <input style="width:150px" id="surname" type="text" class="form-control" name="surname" value="{{$user->name}}" required autofocus>
 		Imię i nazwisko: <input style="width:150px" id="surname" type="text" class="form-control" name="surname" value="{{$user->name}}" required autofocus>
 		Imię i nazwisko: <input style="width:150px" id="surname" type="text" class="form-control" name="surname" value="{{$user->name}}" required autofocus>
 		Imię i nazwisko: <input style="width:150px" id="surname" type="text" class="form-control" name="surname" value="{{$user->name}}" required autofocus>
 		Imię i nazwisko: <input style="width:150px" id="surname" type="text" class="form-control" name="surname" value="{{$user->name}}" required autofocus>
 		Imię i nazwisko: <input style="width:150px" id="surname" type="text" class="form-control" name="surname" value="{{$user->name}}" required autofocus>
 		

       <p><a href="{{url('/admin/orders_this_customers/'.$user->id.'')}}" class="btn btn-primary" role="button">Zobacz zamówienia</a> 
      </div>
    </div>
  </div>
@endforeach
</div>


@endsection