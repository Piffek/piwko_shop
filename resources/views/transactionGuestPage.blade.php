@extends('layouts.app')





@section('content')
<div class="container">
	<div class="col-md-8">
		<div class="container">
			<div class="row">
				
		        <hr/>
		        <h1>Transakcja w toku</h1>
		        <hr/>
		        <strong>Informacje niezbędne do zakupu.</strong>
		        @foreach($products as $product)
		        <h2 class="bg-success">Należność: {{ $product['all_price'] }} zł za {{$product['product']}}</h2>
		        @endforeach
		        <div class="form-group col-md-12 bg-primary">
		            <label class="control-label" for="billinginformation">Informacje do wysyłki</label>
		        </div>
		        

			
		        {!! Form::open(['route'=>['guestTransactionCreate', 'method' => 'POST']]) !!}
		        <select name='delivery_method'>
				<option value="">Forma dostawy</option>
				  <option value="DPD">DPD</option>
				  <option value="UPS">UPS</option>
				</select>
		
				<select name='paying'>
				<option value="">Forma płatnosci</option>
				  <option value="przedplata">Przedpłata</option>
				  <option value="pobranie">Pobranie</option>
				</select>
		        <div class="shipping-info">
		        	<div class="form-group col-md-6">
						{!! Form::text('firstname','Imię', ['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('lastname', 'Nazwisko',['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('email','Email',['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('street','Ulica i numer',['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('city','Miasto',['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('postcode','Kod pocztowy',['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group col-md-12 bg-primary">
		             <div class="control-group">
		                  <div class="controls">
		                  <label class="control-label" for="billinginformation">Rachunek</label>
		                  </div>
		                </div>
		            </div>
					<div class="form-group col-md-6">
						{!! Form::text('firstnameonaccount','Imię', ['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('lastnameonaccount', 'Nazwisko',['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('cardnumber','Numer bankowy',['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('billingstreet','Ulica i numer',['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('billingcity','Miasto',['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('billingpostcode','Kod pocztowy',['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group col-md-12 bg-primary">
		             <div class="control-group">
		                  <div class="controls">
		                  <label class="control-label" for="billinginformation">Dane kontaktowe</label>
		                  </div>
		                </div>
		            </div>
					
					<div class="form-group col-md-6">
						{!! Form::text('phone','Telefon', ['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('companyname', 'Firma',['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::text('nip','NIP',['class' => 'form-control']) !!}
					</div>
					
					
					{!! Form::submit('Zrealizuj!') !!}
				{!! Form::close() !!}			
		            
        </div>
	</div>
</div>
	</div>
</div>

 @endsection
 