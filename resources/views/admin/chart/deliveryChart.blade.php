@extends('layouts.admin')
@section('content')



  <div class="col-md-offset-2">
  <div  id="myfirstchart" style="height: 250px; width: 500px;"></div>
  </div>
<script>
new Morris.Donut({
	  element: 'myfirstchart',
	  data: [
	    {label: "DPD", value: {{ isset($delivery2['0']) ? $delivery2['0']->buyings_count : '0'}}},
	    {label: "UPS", value: {{ isset($delivery2['1']) ? $delivery2['1']->buyings_count : '0'}}},

	  ]
	});

new Morris.Bar({
	  element: 'myfirstchart',
	  data: [
		    { y: 'Poniedziałek', a: {{ isset($dayUPS['1']) ? $dayUPS['1']->buyings_count : '0' }}, 
			    b: {{ isset($dayDPD['1']) ? $dayDPD['1']->buyings_count : '0' }} },
			    
		    { y: 'Wtorek', a: {{ isset($dayUPS['2']) ? $dayUPS['2']->buyings_count : '0' }}, 
				b: {{ isset($dayDPD['2']) ? $dayDPD['2']->buyings_count : '0' }} },
				
		    { y: 'Sroda', a: {{ isset($dayUPS['3']) ? $dayUPS['3']->buyings_count : '0' }}, 
				b: {{ isset($dayDPD['3']) ? $dayDPD['3']->buyings_count : '0' }} },
				
		    { y: 'Czwartek', a: {{ isset($dayUPS['4']) ? $dayUPS['4']->buyings_count : '0' }}, 
				b: {{ isset($dayDPD['4']) ? $dayDPD['4']->buyings_count : '0' }} },
				
		    { y: 'Piątek', a: {{ isset($dayUPS['5']) ? $dayUPS['5']->buyings_count : '0' }}, 
				b: {{ isset($dayDPD['5']) ? $dayDPD['5']->buyings_count : '0' }} },
				
		    { y: 'Sobota', a: {{ isset($dayUPS['6']) ? $dayUPS['6']->buyings_count : '0' }}, 
				b: {{ isset($dayDPD['6']) ? $dayDPD['6']->buyings_count : '0' }} },
				
		    { y: 'Niedziela', a: {{ isset($dayUPS['0']) ? $dayUPS['0']->buyings_count : '0' }}, 
				b: {{ isset($dayDPD['0']) ? $dayDPD['0']->buyings_count : '0' }} }
	  ],
	  xkey: 'y',
	  ykeys: ['a', 'b'],
	  labels: ['UPS', 'DPD']
	});
</script>


@endsection