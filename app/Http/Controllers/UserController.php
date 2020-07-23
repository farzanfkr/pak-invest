<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(5);
        return view('admin.users',['users'=> $users]);
    }

    public function show($id){
        $user = User::find($id);
        return view('admin.user',['user'=>$user]);
    }

    public function create(){
        return view('admin.createUser');
    }

    public function store(Request $request){
        $this -> validate($request,[
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

        $user = new User();
        $user -> name = $request -> name;
        $user -> username = $request -> username;
        $user -> national_code = $request -> national_code;
        $user -> mobile = $request -> mobile;
        $user -> email = $request -> email;
        $user -> role = "investor";
        $user -> active = 1;
        $user -> password =Hash::make($request -> description);
        $user ->save();

        return redirect()->route('user.index')->with('success','کاربر جدید با موفقیت ایجاد شد.');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.editUser',['user'=>$user]);
    }

    public function update(User $user , Request $request){
        dd(1);
        $this -> validate($request,[
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

        $user -> name = $request -> name;
        $user -> username = $request -> username;
        $user -> national_code = $request -> national_code;
        $user -> mobile = $request -> mobile;
        $user -> email = $request -> email;
        $user -> role = $request -> role;
        // $user -> password =Hash::make($request -> description);
        $user ->save();

        return redirect()->route('user.show',$user-> id)->with('success','ویرایش کاربر با موفقیت انجام گرفت.');
    }

    public function delete(User $user){
        $user->delete();
    }
}
