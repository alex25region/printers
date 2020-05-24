<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/admin';
    public function username()
    {
        return 'username';
    }

    protected function attemptLogin(Request $request) {

        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $cred = $request->only($this->username(), 'password');
        $username = $cred[$this->username()];

        $ad = Adldap::getProvider('PKRC00');

        $group_adm = $ad->search()->groups()->find('01_TCol_Admin');


        $resultUser = $ad->search()->where('samaccountname', '=', $username)->first();
//dd($resultUser);
        if ($resultUser) {

            if ($resultUser->inGroup($group_adm->getDn())) {

                //dd($resultUser->inGroup($group_adm->getDn()));
                ($this->guard());
                if ($this->guard()->attempt($this->credentials($request), $request->filled('remember'))) {
                    return true;
                }
                else {
                    return true;
                }
            }
            else {
                //dd('ada');
                return false;
            }

        }
        else return false;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
