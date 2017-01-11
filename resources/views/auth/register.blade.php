@extends('layouts.login')

@section('login_and_registered')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rejestracja</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
						<input hidden name="activated" value="0"></td></tr>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nick</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Hasło</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
	                        <label for="surname" class="col-md-4 control-label">Imię i Nazwisko</label>
		                        <div class="col-md-6">
		                                <input id="Imię i Nazwisko" type="text" class="form-control" name="surname" required>
		                        </div>
 						</div>

                        
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
	                    <label for="city" class="col-md-4 control-label">Kod pocztowy i miejscowosc</label>
	                        <div class="col-md-6">
	                                <input id="Kod pocztowy i miejscowosc" type="text" class="form-control" name="city" required>
	                        </div>
	                    </div>
	                        
	                    <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">    
                        <label for="street" class="col-md-4 control-label">Ulica i numer</label>
	                        <div class="col-md-6">
	                                <input id="Ulica i numer" type="text" class="form-control" name="street" required>
	                        </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">    
                        <label for="phone" class="col-md-4 control-label">Telefon</label>
	                        <div class="col-md-6">
	                                <input id="Telefon" type="text" class="form-control" name="phone" required>
	                        </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">    
                        <label for="companyname" class="col-md-4 control-label">Nazwa Firmy</label>
	                        <div class="col-md-6">
	                              <input id="Nazwa Firmy" type="text" class="form-control" name="companyname">
	                        </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">    
                        <label for="nip"  class="col-md-4 control-label">NIP</label>
	                        <div class="col-md-6">
	                              <input id="nip" maxlength="10" type="text" class="form-control" name="nip">
	                        </div>
						</div>
	
                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
