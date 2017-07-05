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
			<div id="bg-products">
				<div id="absolute">
		        	@yield('content')
	        	</div>
		    </div>
 
        </section>  
                  
                   
        <section>
		    @include('partials._footer')
		    @include('partials.script')
	    </section>  
    </body>

</html>




