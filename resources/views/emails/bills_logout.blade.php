<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
<meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
      @foreach($customers_id as $item)
        <title>faktura_VAT_{{$item->id}}</title>
 
</head>


                    <p>Pieczęć firmy<br></p>



       				<p><b>Faktura Nr {{$item->id_transakcji}}</b></p>



                	
	                    Sprzedawca: <b>{{$admin_data->surname}}</b> <br>
	                    Adres: <b>{{$admin_data->street}},{{$admin_data->city}}</b><br>
	                    NIP: <b>{{$admin_data->nip}}</b><br>
	                    <br>
               
                   
                    
                    @if($item->paying === 'przedplata')
                    	 Nr konta: <b>78 140 0000 0000 0000 1234 5678</b><br></br>
                    @endif
                    
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
                <th>PKWIU</th>
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
                <td>{{$item->produkt}}</td>
                <td></td>
                <td>{{$item->ilosc}}</td>
                <td>szt</td>
                <td>{{($item->cena)-0.23*($item->cena)}} zł</td>
                <td>{{($item->cena*$item->ilosc)-0.23*($item->cena*$item->ilosc)}} zł</td>
                <td>23%</td>
                <td>{{0.23*($item->cena)}}</td>
                <td>{{$item->cena*$item->ilosc}} zł</td>                
            </tr>


        </table>
        


                <p>Razem do zapłaty: <b>{{$item->cena*$item->ilosc}} zł</b></p>
   
           @endforeach

                <p>Podpis odbiorcy</p>
    

    
                <p>Podpis wystawiającego</p>
     
            
 
    </body>
</html>