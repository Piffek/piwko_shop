@extends('layouts.admin')
@section('content')

  <div class="col-md-offset-2">
  <div  id="myfirstchart" style="height: 250px; width: 500px;"></div>
  </div>
<script>
new Morris.Donut({
	  element: 'myfirstchart',
	  data: [
	    {label: "DPD", value: {{ $delivery['0']->buyings_count}}},
	    {label: "UPS", value: {{ $delivery['1']->buyings_count}}},

	  ]
	});
	

</script>
@endsection