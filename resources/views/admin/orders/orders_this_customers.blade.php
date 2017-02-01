@extends('layouts.admin')
@section('content')
<div class="row">
@foreach($orders_this_customers as $orders_this_customer)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>{{ $orders_this_customer-> product }}</h3>
        <h3>{{ $orders_this_customer -> cena }}</h3>
      </div>
    </div>
  </div>
@endforeach
</div>


@endsection