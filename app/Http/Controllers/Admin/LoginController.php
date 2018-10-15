<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Store;
use App\Admin;


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
    protected $redirectTo = '/backend';

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
        return view('admin.auth.login');
    }

/*
|--------------------------------------------------------------------------
| For Stores
|--------------------------------------------------------------------------
|
|
*/

    public function emailsentstores($email , $verifyToken)
    {
        $store = Store::where(['email'=>$email , 'verifyToken'=>$verifyToken])->first();

        if($store){
            $verifyMe = $store->verifyToken;
            $emailAdd = $store->email;
           return view('admin.auth.register',compact('verifyMe', 'emailAdd'));
        }else{
            return "User Not Found.";
        }
    }


    public function register(Request $request)
    {
        // dd($request);
        $store = Store::where(['email'=>$request->emailAdd , 'verifyToken'=>$request->verifyme])->first();
        if($store)
        {
            if($store->email == $request->email){
                $admin = new Admin();
                $admin->name = $store->owner_name;
                $admin->email = $store->email;
                $admin->password = bcrypt($request->password);
                $admin->remember_token = str_random(40);

                $admin->save();

                Store::where(['email'=>$request->emailAdd , 'verifyToken'=>$request->verifyme])->update(['status'=>1, 'verifyToken'=>NULL]);

                return redirect()->route('admin_login')->withSuccess('You are sucessfully registered, login using using email address and password!');

            }else{
                $verifyMe = $store->verifyToken;
                $emailAdd = $store->email;
                return view('admin.auth.register',compact('verifyMe', 'emailAdd'))->withErrors('E-mail Address doesnt exit. Check it again');
            }
        }else{
            return('acess denied!!');
        }
    }





    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('admin_login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
