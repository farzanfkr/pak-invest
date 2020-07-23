<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

//    /*public function register(Request $request){
//
//        $this->validate($request,[
//            'name' => ['required', 'string' , 'alpha' , 'max:255'],
//            'username' => ['required' , 'unique:users' , 'alpha_dash' , 'max:20' , 'min:3'],
//            'email' => [ 'email', 'max:255', 'unique:users'],
//            'mobile' => [ 'numeric' , 'digits:11' , 'unique:users'],
//            'national_code' => [  'numeric' , 'digits:10' , 'unique:users'],
//            'password' => ['string', 'min:8', 'confirmed'],
//        ]/*,[
//            'required' => 'اخطار:این فیلد ضروری است',
//            'max' => 'اخطار:ماکسیمم تعداد کاراکتر مجاز رعایت نشده است.',
//            'mobile.digits' => 'اخطار:شماره تلفن همراه شامل ۱۱ عدد می باشد!',
//            'password.min' => 'اخطار:مینیموم تعداد کاراکتر مجاز ۸ می باشد.',
//            'name.min' => 'اخطار:مینیموم تعداد کاراکتر مجاز ۳ می باشد.',
//            'username.min' => 'اخطار:مینیموم تعداد کاراکتر مجاز ۳ می باشد.',
//            'unique' => 'اخطار:داده از قبل موجود می باشد.',
//            'alpha_dash' => 'اخطار:نام کاربری باید فقط شامل حروف و اعداد و ـ باشد.',
//            'alpha'=> 'اخطار:نام و نام خانوادگی باید فقط شامل حروف  باشد.',
//            'confirmed'=>'اخطار:عدم مطابقت رمز عبور با تکرار آن',
//            'unique' => 'اخطار:قبلا این اطلاعات توسط فرد دیگری وارد شده است.'
//        ]*/);
//        $user = new User();
//        $user -> name = $request -> name;
//        $user -> email = $request -> email;
//        $user -> username = $request -> username;
//        $user -> mobile = $request -> mobile;
//        $user -> national_code = $request -> national_code;
//        $user -> active = 1;
//        //todo
//        $user -> role = 'investor';
//        $user -> password = Hash::make($request -> password);
//        $user ->save();
//        return redirect()->route('home')->with('success','اطلاعات با موفقیت ثبت شد.');
//
//    }*/

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string' , 'alpha' , 'max:255'],
            'username' => ['required' , 'unique:users' , 'alpha_dash' , 'max:20' , 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required' , 'numeric' , 'digits:11' , 'unique:users'],
            'national_code' => ['numeric' , 'digits:10' , 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'required' => 'اخطار:این فیلد ضروری است',
            'max' => 'اخطار:ماکسیمم تعداد کاراکتر مجاز رعایت نشده است.',
            'mobile.digits' => 'اخطار:شماره تلفن همراه شامل ۱۱ عدد می باشد!',
            'password.min' => 'اخطار:مینیموم تعداد کاراکتر مجاز ۸ می باشد.',
            'name.min' => 'اخطار:مینیموم تعداد کاراکتر مجاز ۳ می باشد.',
            'username.min' => 'اخطار:مینیموم تعداد کاراکتر مجاز ۳ می باشد.',
            'unique' => 'اخطار:داده از قبل موجود می باشد.',
            'alpha_dash' => 'اخطار:نام کاربری باید فقط شامل حروف و اعداد و ـ باشد.',
            'alpha'=> 'اخطار:نام و نام خانوادگی باید فقط شامل حروف  باشد.',
            'confirmed'=>'اخطار:عدم مطابقت رمز عبور با تکرار آن',
            'unique' => 'اخطار:قبلا این اطلاعات توسط فرد دیگری وارد شده است.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'national_code' => $data['national_code'],
            //todo set role
            'role' => 'investor',
            'active' => 1 ,
            'password' => Hash::make($data['password']),
        ]);
    }
}
