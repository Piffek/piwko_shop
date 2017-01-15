@extends('layouts.admin')
@section('content')
<div class="row">
@foreach($all_users as $all_user)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>Nick: {{ $all_user-> name }}</h3>
        <h3>Imie i nazwisko: {{ $all_user -> surname }}</h3>

       <p><a href="{{url('/admin/orders_this_customers/'.$all_user->id.'')}}" class="btn btn-primary" role="button">Zobacz zamówienia</a> 
       <a href="{{url('/admin/show_one_customers/'.$all_user->id.'')}}" class="btn btn-primary" role="button">Zarządzaj użytkownikiem</a>
      </div>
    </div>
  </div>
@endforeach
</div>


@endsection