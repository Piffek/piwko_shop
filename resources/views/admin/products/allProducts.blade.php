@extends('layouts.admin')
@section('content')
<div class="row">
@foreach($items as $item)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
      	<h4>Nazwa: {{ $item -> produkt }}</h4><br>
        <h4>Cena: {{ $item -> cena }}</h4><br>
        <h4>Ilośc: {{ $item -> ilosc }} szt</h4>

       <p><a href="{{url('/admin/edit_product/'.$item->id.'')}}" class="btn btn-primary" role="button">Edytuj</a> 
        <p><a href="{{url('/admin/all_product/delete/'.$item->id.'')}}" class="btn btn-primary" role="button">Usun</a> 
      </div>
    </div>
  </div>
@endforeach
</div>


@endsection