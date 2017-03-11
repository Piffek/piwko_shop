<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
<meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
      @foreach($customers_id as $item)
        <title>faktura_VAT_{{$item->id}}</title>
 
</head>


                    <p>Pieczęć firmy<br></p>


					@if(isset($item->id_transaction))
       					<p><b>Faktura Nr {{$item->id}}</b></p>
       				@else
       					<p><b>Faktura Nr {{$item->id}}</b></p>
       				@endif



                	
	                    Sprzedawca: <b>{{$admin_data->surname}}</b> <br>
	                    Adres: <b>{{$admin_data->street}},{{$admin_data->city}}</b><br>
	                    NIP: <b>{{$admin_data->nip}}</b><br>
	                    <br>
               
                   
                    
                    @if($item->paying === 'przedplata')
                    	 Nr konta: <b>78 140 0000 0000 0000 1234 5678</b><br></br>
                    @endif
                    
                    
                    @if(isset($item->billingstreet))
	                    @if(empty($item->companyname))
	                   		Nabywca: <b>{{$item->firstname}} {{$item->lastname}}</b><br>
	                   			Ulica: <b>{{$item->billingstreet}}</b><br>
		                    	Miasto: <b>{{$item->billingcity}}</b><br>
		 
	                    @else
		                    Firma: <b>{{$item->companyname}}</b><br>
	                   		NIP : <b>{{$item->nip}}</b><br></br>
	                   		Ulica: <b>{{$item->billingstreet}}</b><br>
		                    Miasto: <b>{{$item->billingcity}}</b><br>
		                @endif
		            @else
		            	@if(empty($item->companyname))
	                   		Nabywca: <b>{{$item->firstname}} {{$item->lastname}}</b><br>
	                   			Ulica: <b>{{$item->street}}</b><br>
		                    	Miasto: <b>{{$item->city}}</b><br>
		 
	                    @else
		                    Firma: <b>{{$item->companyname}}</b><br>
	                   		NIP : <b>{{$item->nip}}</b><br></br>
	                   		Ulica: <b>{{$item->street}}</b><br>
		                    Miasto: <b>{{$item->city}}</b><br>
		                @endif
		            @endif
					<br>
					<br>
					
					Sposob płatności: <b>{{$item->paying}}</b><br>
                    Termin płatności: <b>{{$item->created_at}}</b><br>



        
        <div>
        <br>
        <table border="1">
            <tr style="background-color: #bababa;">
                <th>Numer faktury</th>
                <th>Nazwa</th>
                <th>Ilość</th>
                <th>Jm</th>
                <th>Cena netto</th>
                <th>Wartość netto</th>
                <th>Stawka VAT</th>
                <th>Kwota VAT</th>
                <th>Wartość brutto</th>
            </tr>
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->product}}</td>
                <td>{{$item->amount}}</td>
                <td>szt</td>
                <td>{{($item->price-($item->price*0.23))/$item->amount}}zł</td>
                <td>{{($item->price-($item->price*0.23))}}zł</td>
                <td>23%</td>
                <td>{{$item->price*0.23}} zł</td>
                <td>{{$item->price}}zł</td>    
            </tr>


        </table>
        


                <p>Razem do zapłaty: <b>{{$item->price*$item->amount}} zł</b></p>
   
           @endforeach

                <p>Podpis odbiorcy</p>
    

    
                <p>Podpis wystawiającego</p>
     
            
 
    </body>
</html>