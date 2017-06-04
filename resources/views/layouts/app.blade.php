<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
	    @include('partials._head')
	</head>
    <body>
        @include('partials._nav')
	    @include('partials._messages')
		@include('partials._validator')
    	@include('partials.flash')   
	       
                          

          @yield('content')
                       
                   
          
		@include('partials._footer')
    </body>
</html>




