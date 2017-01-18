@extends('layouts.admin')
@section('content')
<div class="row">
@foreach($all_orders as $all_order)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
      	<h4>Numer zamówienia: {{ $all_order-> id }}</h4><br>
        <h4>Wykonane: {{ $all_order -> created_at }}</h4><br>

       <p><a href="{{url('/admin/this_order/'.$all_order->id.'')}}" class="btn btn-primary" role="button">Szczegóły</a> 
      </div>
    </div>
  </div>
@endforeach
</div>


@endsection