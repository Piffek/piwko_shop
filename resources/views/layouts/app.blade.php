<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body>
    @include('partials._nav')
    		@include('partials.flash')
    		@include('partials._messages')
	<div class="btn-group-vertical" style="clear:both" role="group" aria-label="Vertical button group">
		@foreach($kinds as $kind)
			<div class="btn-group" role="group">
				<button id="btnGroupVerticalDrop1" style="width:200px; clear:both;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
					{{$kind->kategoria}}
					<span class="caret"></span>
				 </button>
				<ul class="dropdown-menu" style="width:200px; background-color:#F67777" aria-labelledby="btnGroupVerticalDrop1"> 
					<li><a href="search.php?wymiary='.$kind->kategoria.'&rodzaj='.$kind->kategoria.'">{{$kind->kategoria}}</a></li>
			 	</ul>
			</div>

		@endforeach
		</div>

		<div class ="col-md-10">
        @yield('content')
            </div>
    </div>
		<div class="clearfix"></div>
	</div>

				

	<div class="footer">
	<div class="footer-middle">
				<div class="container">
					<div class="col-md-3 footer-middle-in">

						<p>Jesteśmy sklepem z tradycją, działamy od wielu lat.</p>
					</div>
					
					<div class="col-md-3 footer-middle-in">
						<h6>Information</h6>
						<ul class=" in">
							<li><a href="">O nas</a></li>
							<li><a href="">Zobacz nas!</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-3 footer-middle-in">
						<h6>Tagi</h6>
						<ul class="tag-in">
							<li><a href="search.php?wymiary=50x50">Roll Up</a></li>
							<li><a href="search.php?wymiary_scianka=3x3">Ścianka</a></li>
							<li><a href="search.php?wymiary=85x200">Baner</a></li>
							<li><a href="search.php?wymiary=65x165">X Banner</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-middle-in">
						<h6>Newsletter</h6>
						<span>Nowe Informacje, zawsze na mailu</span>
							<form>
								<input type="text" value="Podaj Swój mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Podaj Swój mail';}">
								<input type="submit" value="Zapisz się">	
							</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			
		</div>

   
	<script type="text/javascript">
		hs.graphicsDir = '/javascript/images/';
		hs.align = 'center';
		hs.transitions = ['expand', 'crossfade'];
		hs.outlineType = 'rounded-white';
		hs.fadeInOut = true;
		//hs.dimmingOpacity = 0.75;
	
		// Add the controlbar
		if (hs.addSlideshow) hs.addSlideshow({
			//slideshowGroup: 'group1',
			interval: 5000,
			repeat: false,
			useControls: true,
			fixedControls: 'fit',
			overlayOptions: {
				opacity: .75,
				position: 'bottom center',
				hideOnMouseOut: true
			}
		});
	</script>



    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>

</html>
