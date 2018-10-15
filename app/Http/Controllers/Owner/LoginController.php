<?php

namespace App\Http\Controllers\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Owner;
use App\OwnerList;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /** 
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/owner';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('owner.auth.login');
    }



/*
|--------------------------------------------------------------------------
| For Owner
|--------------------------------------------------------------------------
|
|
*/

    public function emailSentOwner($email , $verifyToken)
    {
        $owner = OwnerList::where(['email'=>$email , 'verifyToken'=>$verifyToken])->first();

        if($owner){
            $verifyMe = $owner->verifyToken;
            $emailAdd = $owner->email;
           return view('owner.auth.register',compact('verifyMe', 'emailAdd'));
        }else{
            return "User Not Found.";
        }
    }

    
    public function register(Request $request)
    {
        $owner = OwnerList::where(['email'=>$request->emailAdd , 'verifyToken'=>$request->verifyme])->first();
        if($owner)
        {
            if($owner->email == $request->email){
                $owners = new Owner();
                $owners->name = $owner->Name;
                $owners->email = $owner->email;
                $owners->password = bcrypt($request->password);
                $owners->remember_token = str_random(40);

                $owners->save();

                OwnerList::where(['email'=>$request->emailAdd , 'verifyToken'=>$request->verifyme])->update(['status'=>1, 'verifyToken'=>NULL]);

                return redirect()->route('owner_login')->withSuccess('You are sucessfully registered, login using using email address and password!');

            }else{
                $verifyMe = $owner->verifyToken;
                $emailAdd = $owner->email;  
                return view('owner.auth.register',compact('verifyMe', 'emailAdd'))->withErrors('E-mail Address doesnt exit. Check it again');
            }
        }else{
            return('acess denied!!');
        }
    }



    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('owner_login');
    }

    protected function guard()
    {
        return Auth::guard('owner');
    }
}
