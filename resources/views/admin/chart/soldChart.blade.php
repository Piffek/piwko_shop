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
	    { day: 'Poniedziałek', Sprzedanych: {{ isset($sold['2']) ? $sold['2']->buyings_count : 0}} },
	    { day: 'Wtorek', Sprzedanych: {{ isset($sold['3']) ? $sold['3']->buyings_count : 0}} },
	    { day: 'Sroda', Sprzedanych: {{ isset($sold['4']) ? $sold['4']->buyings_count : 0}} },
	    { day: 'Czwartek', Sprzedanych: {{ isset($sold['5']) ? $sold['5']->buyings_count : 0}} },
	    { day: 'Piątek', Sprzedanych: {{ isset($sold['6']) ? $sold['6']->buyings_count : 0}} },
	    { day: 'Sobota', Sprzedanych: {{ isset($sold['7']) ? $sold['7']->buyings_count : 0}} },
	    { day: 'Niedziela', Sprzedanych: {{ isset($sold['1']) ? $sold['1']->buyings_count : 0}} },
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