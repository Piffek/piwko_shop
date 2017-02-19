@extends('layouts.admin')
@section('content')
<div class="row">
@foreach($orders_this_customers as $orders_this_customer)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>{{ $orders_this_customer-> product }}</h3>
        <h3>{{ $orders_this_customer -> price }}</h3>
        <h3>{{ $orders_this_customer -> created_at }}</h3>
        <p><a href="{{url('/admin/this_order/'.$orders_this_customer->id.'')}}" class="btn btn-primary" role="button">Szczegóły</a> 
      </div>
    </div>
  </div>
@endforeach
</div>


@endsection