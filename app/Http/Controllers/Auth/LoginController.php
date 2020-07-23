<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

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


//    public function login(Request $request){
//        $this->validate($request,[
//            'username' => ['required'],
//            'password' => ['string'],
//        ]/*,[
//            'required' => 'اخطار:این فیلد ضروری است',
//            'max' => 'اخطار:ماکسیمم تعداد کاراکتر مجاز رعایت نشده است.',
//            'password.min' => 'اخطار:مینیموم تعداد کاراکتر مجاز ۸ می باشد.',
//            'unique' => 'اخطار:داده از قبل موجود می باشد.',
//            'unique' => 'اخطار:قبلا این اطلاعات توسط فرد دیگری وارد شده است.'
//        ]*/);
//        //$username = $request->username;
//        $user = User::where('username', $request->username)->first();
//        $pass = Hash::make($request -> password);
//        if ($pass == $request -> password){
//
//        }
//    }

    public function username()
    {
        return 'username';
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
