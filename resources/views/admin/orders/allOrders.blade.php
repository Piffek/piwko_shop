@extends('layouts.admin')
@section('content')
<div class="row">
@foreach($all_orders as $all_order)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
      	<h4>Numer zamówienia: {{ $all_order-> id }}</h4><br>
        <h4>Wykonane: {{ $all_order -> created_at }}</h4><br>
		<a href="{{route('billsPDF',['id'=>$all_order->id])}}">Faktura</a><br>
       <p><a href="{{route('adminThisOrder',['id'=>$all_order->id])}}" class="btn btn-primary" role="button">Szczegóły</a> 
      </div>
    </div>
  </div>
@endforeach
</div>


@endsection