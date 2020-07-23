<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(5);
        return response()->json($users,200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = $this->getValidationFactory()->make($request->all(), [
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
        if ($validation->fails()){
            return response()->json(['message'=>'invalid data'],400);
        }

        $user = new User();
        $user -> name = $request -> name;
        $user -> username = $request -> username;
        $user -> national_code = $request -> national_code;
        $user -> mobile = $request -> mobile;
        $user -> email = $request -> email;
        $user -> role = "user";
        $user -> active = 1;
        $user -> password =Hash::make($request -> description);
        $user ->save();

        return response()->json(['message'=> 'saved succesfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //$user = Auth::user();
        $user =User::find($id);
        if(!$user){
            return response()->json(['message' =>'not found'],404);
        }
        $data = [
        'name' => $user -> name,
        'national_code' => $user -> national_code,
        'mobile' => $user -> mobile,
        'email' => $user -> email,
        'income' => $user -> income,
        'username' => $user -> username
        ];

        return response()->json($data,200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validation = $this->getValidationFactory()->make($request->all(), [
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
        if ($validation->fails()){
            return response()->json(['message'=>'invalid data'],400);
        }

        $user = User::find($id);
        $user -> name = $request -> name;
        $user -> username = $request -> username;
        $user -> national_code = $request -> national_code;
        $user -> mobile = $request -> mobile;
        $user -> email = $request -> email;
        $user -> password =Hash::make($request -> password);
        $user ->save();

        return response()->json(['message'=> 'saved successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['message'=>'deleted successfully'],200);
    }

    public function myProject(){
        $user = Auth::user();
        $projects = Project::where('employer_id', $user);

        return response()->json($projects , 200);
    }

    public function myInvestment(){
        $projects = array();
        $user = Auth::user();
        $results = ProjectUser::where('user_id',$user);
        foreach($results as $result){
            $project = Project::find($result -> project_id);
            array_push($projects,$project);
        }

        return response()->json($projects,200);
    }
}
