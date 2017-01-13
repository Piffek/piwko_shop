@extends('layouts.admin')
@section('content')
<div class="row">
@foreach($orders_this_customers as $orders_this_customers)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>Nick: {{ $all_user-> name }}</h3>
        <h3>Imie i nazwisko: {{ $all_user -> surname }}</h3>

        <p><a href="#" class="btn btn-primary" role="button">Zobacz zamówienia</a>
      </div>
    </div>
  </div>
@endforeach
</div>


@endsection