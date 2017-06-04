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
    	
			<div id="page">
				<div id="right-top"></div>
				<div id="left-top"></div>
				<div id="borderTopBottom"></div>
				<div id="borderLeftRight"></div>
				<div id="right-bottom"></div>
				<div id="left-bottom"></div>
			</div>                   

          @yield('content')
                       
                   
          
		@include('partials._footer')
    </body>
</html>




