<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Support\Facades\Validator;
use Input;
use Session;
use DB;

class LoginController extends Controller
{
	protected $redirectTo = '/dashboard';
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function showLogin()
    {
    	return view('login.login');
    }


     public function authenticate(Request $request)
 	{
	     $this->validate($request, [  
	     	  'trueemployee_id' => 'required',    
	     	  'password' => 'required',    
	          // 'g-recaptcha-response' => 'required|captcha',
	      ]);
	   
	    $user = User::where('trueemployee_id', '=',  $request->input('trueemployee_id'))->first();
	     if(!$user){
	     	return "User Not Found";
	     }

	     if(!($user->password == strtoupper(md5($request->input('password'))))){
	     	Session::flash('message', "Your Password is Wrong!");
	     	 return redirect('login');
	     }
	     Auth::login($user);

	     $user = DB::table('trueemployee')
                ->where('trueemployee.trueemployee_id',Auth::user()->trueemployee_id)
                ->first();

        session(['user' => $user]);

	    return redirect('/dashboard');
	}



	public function logout() {

		 Auth::logout();
		 return redirect('login');
 	}

}

