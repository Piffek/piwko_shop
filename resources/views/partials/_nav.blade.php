
          

		
        <nav>
            <div id="page">
				<div id="right-top"></div>
				<div id="left-top"></div>
				<div id="borderTop"></div>
				<div id="borderBottom"></div>
				<div id="borderLeft"></div>
				<div id="borderRight"></div>
				<div id="right-bottom"></div>
				<div id="left-bottom"></div>
		            <div class="container">
		                <div class="navbar-header">
		          			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
		                        <span class="sr-only">Toggle Navigation</span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                    </button>
		                    <!-- Branding Image -->
                    
                </div>

                <div class="collapse navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul id="top" class="nav navbar-nav navbar-left">
                        <!-- Authentication Links -->
                        
                        @if (Auth::guest())
                            <li><a class="menuTop" data-toggle="modal" data-target=".bs-example-modal-lg">zaloguj</a></li>
                            <li><a class="menuTop" data-toggle="modal" data-target=".bs-example-modal-sm">Zarejestruj</a></li>
                            <li><a class="menuTop" href="{{route('basketGuest')}}">Koszyk</a></li>
                        @else
							@if(Auth::user()->getRolesUser()->id === 1)
                            	<li><a class="menuTop" href=" {{ route('adminStartPage') }}">
                        			Admin</a></li>
                            	<li class="dropdown">
                            @endif
                            @if(Auth::user()->getRolesUser()->id === 2)
                            	<li><a class="menuTop" href=" {{ route('showWorkerPanel') }}">
                        			Pracownik</a></li>
                            	<li class="dropdown">
                            @endif
                        	<li><a class="menuTop" href=" {{ route('basket') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">
                        		</span>Koszyk</a></li>
                            <li class="dropdown">
                                <a class="menuTop" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-haspopup="true" aria-expanded="false">
 									 <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                	{{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Wyloguj
                                        </a>
                                        <a href="{{ route('data') }}">
                                            Twoje Dane
                                        </a>
                                        
                                        <a href="{{ route('showAdressDelivery') }}">
                                            Dodaj adres dostawy
                                        </a>
                                        <a href="{{ route('buying') }}">
                                            Historia Zakupów
                                        </a>
                                        

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
		                                            {{ csrf_field() }}
		                                        </form>
		                                        
		                                    </li>
		                                </ul>
		                            </li>
		                        @endif
		                   
		                    </ul>
		                    @include('partials._validator')
		                </div>
		            </div>
            	
			</div>	
			








<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria="false" aria-labellebdy="MyLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">

      @include('auth.login')
	</div>


</div>


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-lg" role="document">
      @include('auth.register')
	</div>
</div>
        </nav>

@include('partials._firstPositionInHomePage');



</div>
