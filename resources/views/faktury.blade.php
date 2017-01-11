<!DOCTYPE html>
<html>

<head>

  <meta http-equiv="Content-Type" content="charset=utf-8" />
          @foreach($buying as $item)
        <title>faktura_VAT_{!!$item->id!!}</title>
 
</head>


                    <p>Pieczęć firmy<br></p>



                    <p><b>Faktura Nr {!!$item->id!!}</b></p>




                	@foreach($admin_data as $data)
	                    Sprzedawca: <b>{!!$data->surname!!}</b> <br>
	                    Adres: <b>{!!$data->street!!},{!!$data->city!!}</b><br>
	                    NIP: <b>{!!$data->nip!!}</b><br>
	                    <br>
                    @endforeach

                    


                    Nabywca: <b>{!!$item->surname!!}</b><br>
                    Adres: <b>{!!$item->street!!},{!!$item->city!!}</b><br>
                    NIP : <b>{!! isset($item->nip) ? $item->nip : '' !!}</b>
					<br>
					<br>


                
                    Sposob płatności: <b>{!!$item->paying!!}</b><br>
                    Termin płatności: <b>{!!$item->created_at!!}</b><br>
                    @if($item->paying === 'przedplata')
                    	 Nr konta: <b>78 140 0000 0000 0000 1234 5678</b>
                    @endif


        
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
            
                <td>{!!$item->id!!}</td>
                <td>{!!$item->produkt!!}</td>
                <td></td>
                <td>{!!$item->ilosc!!}</td>
                <td></td>
                <td>{!!($item->cena)-0.23*($item->cena)!!}</td>
                <td>{!!($item->cena*$item->ilosc)-0.23*($item->cena*$item->ilosc)!!}</td>
                <td>23%</td>
                <td>{!!0.23*($item->cena)!!}</td>
                <td>{!!$item->cena*$item->ilosc!!}</td>                
            </tr>

        </table>
        


                <p>Razem do zapłaty: <b>{!!$item->cena*$item->ilosc!!}</b></p>
   
			@endforeach

                <p>Podpis odbiorcy</p>
    

    
                <p>Podpis wystawiającego</p>
     
            
 
    </body>
</html>




