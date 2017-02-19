@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
      	<h4>Numer zamówienia: {{ $this_order-> id }}</h4><br>
      	<h4>Przedmiot zlecenia: {{ $this_order-> product }}</h4><br>
      	<h4>Cena jednostkowa: {{ $this_order->price }} zł</h4><br>
      	<h4>Ilość: {{ $this_order->amount }} szt</h4><br>
      	<h4>Kwota zlecenia: {{ $this_order->price * $this_order->amount }} zł</h4><br>
      	
        <h4>Wykonane: {{ $this_order -> created_at }}</h4><br>

       <p><a href="{{url('/admin/delete_this_order/'.$this_order->id.'')}}" class="btn btn-primary" role="button">Usuń</a> 
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
      	<h4>Klient: {{ $this_order-> surname }}</h4><br>
      	<h4>Firma: {{ $this_order-> companyname }}</h4><br>
      	<h4>Miasto: {{ $this_order->city }}</h4><br>
      	<h4>Ulica: {{ $this_order->street }}</h4><br>
      	<h4>Dostawa: {{ $this_order->delivery  }}</h4><br>
		<h4>Metoda płatności: {{ $this_order -> paying }}</h4><br>
      </div>
    </div>
  </div>
</div>


@endsection