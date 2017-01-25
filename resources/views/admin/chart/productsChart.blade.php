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
	    { day: 'Poniedziałek', Sprzedanych: {{$day['1']->buyings_count}} },
	    { day: 'Wtorek', Sprzedanych: {{$day['2']->buyings_count}} },
	    { day: 'Sroda', Sprzedanych: {{$day['3']->buyings_count}} },
	    { day: 'Czwartek', Sprzedanych: {{$day['4']->buyings_count}} },
	    { day: 'Piątek', Sprzedanych: {{$day['5']->buyings_count}} },
	    { day: 'Sobota', Sprzedanych: {{$day['6']->buyings_count}} },
	    { day: 'Niedziela', Sprzedanych: {{$day['0']->buyings_count}} },
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