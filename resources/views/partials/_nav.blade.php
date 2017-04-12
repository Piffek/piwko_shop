<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
          			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/strona_domowa') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                            <a style="margin-top:7px;" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">zaloguj</a>
                       
                         	 <a style="margin-top:7px;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Zarejestruj</a>
                            <li><a href="{{route('basketGuest')}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">Koszyk</span></a>
                        @else
                       		
							@if(Auth::user()->getRolesUser()->name === "Admin")
                            	<li><a href=" {{ route('adminStartPage') }}">
                        			Admin</a></li>
                            	<li class="dropdown">
                            @endif
                        	<li><a href=" {{ route('basket') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">
                        		</span>Koszyk</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-haspopup="true" aria-expanded="false">
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
        </nav>


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



</div>
