@extends('layouts.worker')
@section('content')
		@foreach($order as $state)
		<div class="row">
			<div class="col-sm-3 col-md-4">
				    <div class="thumbnail">
				     	<div class="caption">
							ID_transakcji: {{ $state->id }}<br>
							Porodukt: {{ $state->product }}<br>
							Liczba sztuk: {{ $state->amount }}<br>
							<a href="/pdf/{{$state->id}}">Faktura</a><br>
							<form method="POST" action="/worker/changeState/{{$state->id}}">
								{!! csrf_field() !!}
								<select name="state">
									<option>{{ $state->state }}</option>
									<option>W trakcie przyjęcia</option>
									<option>W realizacji</option>
									<option>W doręczeniu</option>
									<option>Zrealizowano</option>
								</select>
								<input type="submit" value="zmień">
							</form>
						</div>
					</div>
			</div>
		</div>
		@endforeach
@endsection