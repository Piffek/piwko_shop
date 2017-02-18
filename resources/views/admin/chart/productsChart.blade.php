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
	    { day: 'Poniedziałek', Sprzedanych: {{ isset($day['2']) ? $day['2']->buyings_count : 0}} },
	    { day: 'Wtorek', Sprzedanych: {{ isset($day['3']) ? $day['3']->buyings_count : 0}} },
	    { day: 'Sroda', Sprzedanych: {{ isset($day['4']) ? $day['4']->buyings_count : 0}} },
	    { day: 'Czwartek', Sprzedanych: {{ isset($day['5']) ? $day['5']->buyings_count : 0}} },
	    { day: 'Piątek', Sprzedanych: {{ isset($day['6']) ? $day['6']->buyings_count : 0}} },
	    { day: 'Sobota', Sprzedanych: {{ isset($day['7']) ? $day['7']->buyings_count : 0}} },
	    { day: 'Niedziela', Sprzedanych: {{ isset($day['1']) ? $day['1']->buyings_count : 0}} },
	  ],
	  // The name of the data record attribute that contains x-values.
	  xkey: 'day',
	  // A list of names of data record attributes that contain y-values.
	  ykeys: ['Sprzedanych'],
	  // Labels for the ykeys -- will be displayed when you hover over the
	  // chart.
	  labels: ['Sprzedanych']
	});
</script>
@endsection