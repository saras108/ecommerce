<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Socialite;
use App\User;

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
    protected $redirectTo = '/home';

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
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $facebook = Socialite::driver('facebook')->user();

        $finduser = User::where('email', $facebook->email)->first();

        if($finduser)
        {

        Auth::login($finduser);

        }else{

        $user = new User;

        $user->name = $facebook->name;
        $user->email = $facebook->email;
        $user->password = Hash::make(str_random(8));

        $user->save();

        Auth::login($user);

        }

       return redirect()->to('home');
    }




    /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGoogle()
    {
        $google = Socialite::driver('google')->user();

        $finduser = User::where('email', $google->email)->first();

        if($finduser)
        {

        Auth::login($finduser);

        }else{

        $user = new User;

        $user->name = $google->name;
        $user->email = $google->email;
        $user->password = Hash::make(str_random(8));

        $user->save();

        Auth::login($user);

        }

       return redirect()->to('home');
    }
}
