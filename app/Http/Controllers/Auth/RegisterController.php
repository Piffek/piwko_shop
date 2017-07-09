<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationAccount;
use App\Repositories\UserRepository as User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
class RegisterController extends Controller
{
	/*
	 |--------------------------------------------------------------------------
	 | Register Controller
	 |--------------------------------------------------------------------------
	 |
	 | This controller handles the registration of new users as well as their
	 | validation and creation. By default this controller uses a trait to
	 | provide this functionality without requiring any additional code.
	 |
	 */
	use RegistersUsers;
	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(User $user){
		$this->middleware('guest');
		$this->user = $user;
		
	}
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data){
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
		]);
	}



	public function register(Request $request){
		
		$this->validator($request->all())->validate();
		event(new Registered($user = $this->create($request->all())));
		Mail::to($user->email)->send(new ConfirmationAccount($user));
		
		return back()->with('status', 'Na podany mail, została wysłana wiadomość aktywacyjna.');
	}
	
	/**
	 * Confirm a user's email address.
	 *
	 * @param  string $token
	 * @return mixed
	 */
	public function confirmEmail($token){
	    $this->user->where('token', array($token))->firstOrFail()->hasVerified();
		return redirect('strona_domowa')->with('status', 'Możesz się zalogować.');
	}

	protected function create(array $data)
	{
	    return $this->user->create([
	        'name' => $data['name'],
	        'email' => $data['email'],
	        'password' => bcrypt($data['password']),
	        'surname' => $data['surname'],
	        'street' => $data['street'],
	        'city' => $data['city'],
	        'phone' => $data['phone'],
	        'companyname' => $data['companyname'],
	        'nip' => $data['nip'],
	        'activated' => $data['activated'],
	    ]);

	}

}
