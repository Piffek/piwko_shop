<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body>
    @include('partials._nav')
		@include('partials.flash')
</body>
        @yield('login_and_registered')

		<script type="text/javascript">
		
		
			var numer = Math.floor(Math.random()*3)+1;
			
			var timer1 = 0;
			var timer2 = 0;
			
			function ustawslajd(nrslajdu)
			{
				clearTimeout(timer1);
				clearTimeout(timer2);
				numer = nrslajdu - 1;
				
				schowaj();
				setTimeout("zmienslajd()", 500);
				
			}
			
			function schowaj()
			{
				$("#slider").fadeOut(500);
			}
		
			function zmienslajd()
			{
				numer++; if (numer>3) numer=1;
				
				var plik = "<img height='600px' width='100%' src=\"slajdy/slide" + numer + ".jpg\" />";
				
				document.getElementById("slider").innerHTML = plik;
				$("#slider").fadeIn(500);
				
				timer1 = setTimeout("zmienslajd()", 5000);
				timer2 = setTimeout("schowaj()", 4500);
			
			}

		</script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>


   
    