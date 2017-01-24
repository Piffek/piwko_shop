@extends('layouts.admin')
@section('content')

  <div class="col-md-offset-2">
  <div  id="myfirstchart" style="height: 250px; width: 500px;"></div>
  </div>
<script>
new Morris.Line({
	  // ID of the element in which to draw the chart.
	  parseTime:false,
	  element: 'myfirstchart',
	  // Chart data records -- each entry in this array corresponds to a point on
	  // the chart.
	  
	  data: [
	    { day: 'Poniedziałek', value: 3234 },
	    { day: 'Wtorek', value: 100 },
	    { day: 'Sroda', value: 533 },
	    { day: 'Czwartek', value: 335 },
	    { day: 'Piątek', value: 20 },
	    { day: 'Sobota', value: 2033 },
	    { day: 'Niedziela', value: 2220 }
	  ],
	  // The name of the data record attribute that contains x-values.
	  xkey: 'day',
	  // A list of names of data record attributes that contain y-values.
	  ykeys: ['value'],
	  // Labels for the ykeys -- will be displayed when you hover over the
	  // chart.
	  labels: ['Value']
	});
</script>
@endsection