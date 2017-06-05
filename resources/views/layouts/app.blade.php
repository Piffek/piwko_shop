<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
	    @include('partials._head')
	</head>
    <body>
	    <section>
	        @include('partials._nav')
	    </section> 
	    @include('partials._messages')
		@include('partials._validator')
    	@include('partials.flash')
        
		<section>
        	@yield('content')
        </section>               
                   
          
		@include('partials._footer')
    </body>
</html>




