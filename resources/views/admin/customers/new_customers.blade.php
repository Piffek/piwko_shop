@extends('layouts.admin')
@section('content')
<div class="row">
@foreach($new_users_todays as $new_users_today)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>Nick: {{ $new_users_today -> name }}</h3>
        <h3>Imie i nazwisko: {{ $new_users_today -> surname }}</h3>

        <p><a href="{{url('/admin/orders_this_customers/'.$new_users_today->id.'')}}" class="btn btn-primary" role="button">Zobacz zamówienia</a> <a href="#" class="btn btn-primary" role="button">Zarządzaj użytkownikiem</a>
      </div>
    </div>
  </div>
@endforeach
</div>


@endsection