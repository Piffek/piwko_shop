@extends('layouts.app')





@section('content')
	<div class="col-md-8 col-md-offset-2">
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
        <form method="POST" action="/transakcja_gosc/create">
        {!! csrf_field() !!}
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
              <span class="required-lbl">* </span><label class="control-label" for="firstname">Imię</label>
              <div class="controls">
                <input id="firstname" name="firstname" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="lastname">Nazwisko</label>
              <div class="controls">
                <input id="lastname" name="lastname" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
               <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="lastname">Email</label>
              <div class="controls">
                <input id="lastname" name="email" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="shippingaddress">Ulica i numer</label>
              <div class="controls">
                <input id="street" name="street" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            

             
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="shippingcity">Miasto</label>
              <div class="controls">
                <input id="city" name="city" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="postcode">Kod pocztowy</label>
              <div class="controls">
                <input id="postcode" name="postcode" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <hr/>
            
            <div class="form-group col-md-12 bg-primary">
             <div class="control-group">
                  
                  <div class="controls">
                  <label class="control-label" for="billinginformation">Rachunek</label>
                    </label>
                  </div>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="control-group">
                    <span class="required-lbl">* </span><label class="control-label" for="firstnameonaccount">Imię</label>
                    <div class="controls">
                        <input id="firstnameonaccount" name="firstnameonaccount" type="text" placeholder="" class="form-control" required="">
                    </div>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="control-group">
                    <span class="required-lbl">* </span><label class="control-label" for="lastnameonaccount">Nazwisko</label>
                    <div class="controls">
                        <input id="lastnameonaccount" name="lastnameonaccount" type="text" placeholder="" class="form-control" required="">
                    </div>
                </div>
            </div>
            
            
            <div class="form-group col-md-6">
                <div class="control-group">
                    <span class="required-lbl">* </span><label class="control-label" for="cardnumber">Numer Karty</label>
                    <div class="controls">
                        <input id="cardnumber" name="cardnumber" type="text" placeholder="" class="form-control" required="">
                    </div>
                </div>
            </div>
            
           
            
            <div class="form-group col-md-6">
            </div>
            
        <hr/>
        
      
        
        <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="billingaddress1">Ulica i numer</label>
              <div class="controls">
                <input id="billingstreet" name="billingstreet" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
   
            
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="billingcity">Miasto</label>
              <div class="controls">
                <input id="billingcity" name="billingcity" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <span class="required-lbl">* </span><label class="control-label" for="billingpostcode">Kod pocztowy</label>
              <div class="controls">
                <input id="billingpostcode" name="billingpostcode" type="text" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-12 bg-primary">
                <label class="control-label" for="contactinformation">Dane kontaktowe:</label>
            </div>
            
            
            <div class="form-group col-md-6">
              <label class="control-label" for="phone">Telefon</label>
              <div class="controls">
                <input id="phone" name="phone" type="number" placeholder="" class="form-control" required="">
              </div>
            </div>
            
            <div class="form-group col-md-6">
              <label class="control-label" for="organization">Firma</label>
              <div class="controls">
                <input id="companyname" name="companyname" type="text" placeholder="" class="form-control" >
              </div>
            </div>
            
             <div class="form-group col-md-6">
              <label class="control-label" for="organization">NIP</label>
              <div class="controls">
                <input id="companyname" name="nip" type="text" placeholder="" class="form-control" >
              </div>
            </div>
            
              
            
            <div class="form-group col-md-12">
                <div class="control-group confirm-btn">
                  <label class="control-label" for="placeorderbtn"></label>
                  <div class="controls">
                   <input type="submit" value="Zrealizuj"></tr>
                  </div>
                </div>
            </div>
            
        </div>
	</div>
</div>
	</div>

 @endsection
 