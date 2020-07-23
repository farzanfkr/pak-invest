<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $datas=array();
        $projects = Project::orderBy('id','desc')->paginate(5);
        foreach ($projects as $project){
            $data =[
                'title'=>$project->title,
                'employer_name'=>$project->employer_name,
                'needed budget'=>$project->needed_budget,
                'current budget'=>$project->current_budget,
                'budget percent'=>($project->current_budget / $project->needed_budget),
                'description'=>$project->description
            ];
            array_push($datas,$data);
        }

        return response()->json($datas,200);
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
            'title' => 'required|string|alpha|min:3|max:30',
            'address' => 'required|string|max:300',
            'description' => 'required|string|alpha|max:500',
        ],[
            'required' => 'اخطار:این فیلد ضروری است',
            'max' => 'اخطار:ماکسیمم تعداد کاراکتر مجاز ۲۰ می باشد.',
            'alpha'=>'اخطار:نام و نام خانوادگی باید فقط شامل حروف  باشد،بدون فاصله!',
        ]);
        if ($validation->fails()){
            return response()->json(['message'=>'invalid data'],400);
        }
        $user = Auth::user();
        $project = new Project();
        $project -> title = $request -> title;
        $project -> employer_id = $user -> id;
        $project -> employer_name = $user -> name;
        $project -> employer_national_code = $user -> national_code;
        $project -> employer_mobile = $user -> mobile;
        $project -> address = $request -> address;
        $project -> description = $request -> description;
        //$project -> investment_cost = $request -> investment_cost;
        $project -> status = 'fundraising';
        $project ->save();

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
        $project =Project::find($id);
        if(!$project){
            return response()->json(['message' =>'not found'],404);
        }
        $data = [
            'id'=>$id,
            'title'=>$project->title,
            'employer_name'=>$project->employer_name,
            'needed budget'=>$project->needed_budget,
            'current budget'=>$project->current_budget,
            'budget percent'=>($project->current_budget / $project->needed_budget),
            'description'=>$project->description
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
            'title' => 'required|string|alpha|min:3|max:30',
            'address' => 'required|string|max:300',
            'description' => 'required|string|alpha|max:500',
        ],[
            'required' => 'اخطار:این فیلد ضروری است',
            'max' => 'اخطار:ماکسیمم تعداد کاراکتر مجاز ۲۰ می باشد.',
            'alpha'=>'اخطار:نام و نام خانوادگی باید فقط شامل حروف  باشد،بدون فاصله!',
        ]);
        if ($validation->fails()){
            return response()->json(['message'=>'invalid data'],400);
        }
    //    $user =Auth::user();
        $project = Project::find($id);
        $project -> title = $request -> title;
//        $project -> employer_id = $user ->id;
//        $project -> employer_name = $user -> name;
//        $project -> employer_national_code = $user -> national_code;
//        $project -> employer_mobile = $user -> mobile;
        $project -> address = $request -> address;
        $project -> description = $request -> description;
//        $project -> status = $request ->status;
        $project ->save();

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
        Project::find($id)->delete();
        return response()->json(['message'=>'deleted successfully'],200);
    }

    public function storeInvestor(Request $request,$projectId,$userId){
//        $project = Project::find($projectId);
//        $project->users()->attach($userId);
//        $project->save();

        $user_project= new ProjectUser();
        $user_project-> user_id = $userId;
        $user_project-> project_id = $projectId;
        $user_project -> investment_amount = $request -> investment_amount;
        $user_project->save();

//        $user = User::find($userId);
//        $user -> projects()->attach($projectId);
//        $user -> save();

        return response()->json(['message'=>'saved successfully'],200);
    }
}
