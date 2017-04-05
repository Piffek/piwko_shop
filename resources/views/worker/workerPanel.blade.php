@extends('layouts.admin')
@section('content')
	@foreach($order as $state)
		{{ $state->state }}
	@endforeach
@endsection