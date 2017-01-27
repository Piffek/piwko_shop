@extends('layouts.admin')
@section('content')



  <div class="col-md-offset-2">
  <div  id="myfirstchart" style="height: 250px; width: 500px;"></div>
  </div>
<script>
new Morris.Donut({
	  element: 'myfirstchart',
	  data: [
	    {label: "Przedpłata", value: {{ isset($delivery2['0']) ? $delivery2['0']->buyings_count : '0'}}},
	    {label: "Pobranie", value: {{ isset($delivery2['1']) ? $delivery2['1']->buyings_count : '0'}}},

	  ]
	});

new Morris.Bar({
	  element: 'myfirstchart',
	  data: [
		    { y: 'Poniedziałek', a: {{ isset($UPS['2']) ? $UPS['2']->buyings_count : '0' }}, 
			    b: {{ isset($DPD['2']) ? $DPD['2']->buyings_count : '0' }} },
			    
		    { y: 'Wtorek', a: {{ isset($UPS['3']) ? $UPS['3']->buyings_count : '0' }}, 
				b: {{ isset($DPD['3']) ? $DPD['3']->buyings_count : '0' }} },
				
		    { y: 'Sroda', a: {{ isset($UPS['4']) ? $UPS['4']->buyings_count : '0' }}, 
				b: {{ isset($DPD['4']) ? $DPD['4']->buyings_count : '0' }} },
				
		    { y: 'Czwartek', a: {{ isset($UPS['5']) ? $UPS['5']->buyings_count : '0' }}, 
				b: {{ isset($DPD['5']) ? $DPD['5']->buyings_count : '0' }} },
				
		    { y: 'Piątek', a: {{ isset($UPS['6']) ? $UPS['6']->buyings_count : '0' }}, 
				b: {{ isset($DPD['6']) ? $DPD['6']->buyings_count : '0' }} },
				
		    { y: 'Sobota', a: {{ isset($UPS['7']) ? $UPS['7']->buyings_count : '0' }}, 
				b: {{ isset($DPD['7']) ? $DPD['7']->buyings_count : '0' }} },
				
		    { y: 'Niedziela', a: {{ isset($UPS['1']) ? $UPS['1']->buyings_count : '0' }}, 
				b: {{ isset($DPD['1']) ? $DPD['1']->buyings_count : '0' }} }
	  ],
	  xkey: 'y',
	  ykeys: ['a', 'b'],
	  labels: ['Przedpłata', 'Pobranie']
	});
</script>


@endsection