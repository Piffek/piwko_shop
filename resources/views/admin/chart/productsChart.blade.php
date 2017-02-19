@extends('layouts.admin')
@section('content')

  <div class="col-md-offset-2">
  <div  id="myfirstchart" style="height: 250px; width: 500px;"></div>

  </div>
<script>
new Morris.Donut({
	  element: 'myfirstchart',
	  data: [
		@foreach($productsWithDB as $oneProduct)

			
			{label: "{{ isset($product[$oneProduct->product]) ? $product[$oneProduct->product]->products : $oneProduct->product}}", value: {{ isset($product[$oneProduct->product]) ? $product[$oneProduct->product]->buyings_count : '0'}}},
		    @endforeach
	  ]
	});
</script>
@endsection