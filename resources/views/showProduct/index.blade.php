@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div  class="panel panel-default">
			<div class="panel-body text-center">
			<div id="galeria"></div>	
			
					
				<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">    
				<div class="col-md-6 col-md-offset-3">
				@if(Auth::check())
					@if($items->amount > 0)
					@if($items->promotion = 'Tak' && $items->percent_promotion != 0 && isset($items->text_promotion))
							<div class="new_price">{{ $items->price-($items->price*2)/100  }} zł</div>
						@elseif($items->promotion = 'Tak' && !empty($items->text_promotion) && $items->percent_promotion==0)
							{{ $items->price }} zł
							<div class="promocja">PROMOCJA</div>
						@elseif($items->promotion = 'Tak' && $items->percent_promotion!=0 && !empty($items->text_promotion))
							{{ $items->price }} zł
						@elseif ($items->promotion = 'Nie')
							{{ $items->price }} zł
					@endif	
						{!! Form::open(['route'=>['addToBasket']]) !!}
							{!! Form::hidden('product', $items->product) !!}
							{!! Form::hidden('price', $items->price) !!}
							{!! Form::hidden('id_product', $items->id) !!}
							{!! Form::text('amount') !!}
							{!! Form::submit('Do koszyka!') !!}
							<div id="galeria"></div>	
						{!! Form::close() !!}			
					@else
						Tego produktu aktualnie nie ma w magazynie
					@endif
				@else
				@foreach($files as $file)
			        <a href="/{{ $file }}" class="highslide" onclick="return hs.expand(this)"><img width="200" height="133" src="/ {{ $file }}" /></a>
			    @endforeach
					@if($items->amount > 0)
						Ilosc:
						{!! Form::open(['route' => ['addToGuestBasket', $items->id ]]) !!}
							{!! Form::hidden('random_id_product', rand(0, 1000000)) !!}
							{!! Form::text('amount') !!}
							{!! Form::submit('Do koszyka!') !!}
						{!! Form::close() !!}
					@else
						Tego produktu aktualnie nie ma w magazynie
					@endif
				@endif
				<h3>{!!$items->desc!!}</h3>
				</div>
			</div>
		</div>
	</div>
</div>




@endsection
