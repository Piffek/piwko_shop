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
	    { day: 'Poniedziałek', value: 34 },
	    { day: 'Wtorek', value: 1002 },
	    { day: 'Sroda', value: 52323 },
	    { day: 'Czwartek', value: 5 },
	    { day: 'Piątek', value: 2230 },
	    { day: 'Sobota', value: 2230 },
	    { day: 'Niedziela', value: 20 }
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