<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::paginate(5);
        return view('admin.projects',['projects'=> $projects]);
    }

    public function show($id){
        $project =Project::find($id);
        return view('admin.project',['project'=> $project]);
    }

    public function create(){
        return view('admin.createProject');
    }

    public function store(Request $request){
        $this -> validate($request,[
            'title' => 'required|string|alpha|min:3|max:30',
            'employer_name' => 'required|string|alpha|min:3|max:30',
            'employer_national_code' => 'digits:10|numeric',
            'employer_mobile' => 'numeric|digits:11',
            'address' => 'required|string|max:300',
            'investment_cost' => 'string|numeric',
            'description' => 'required|string|alpha|max:500',
        ],[
            'required' => 'اخطار:این فیلد ضروری است',
            'max' => 'اخطار:ماکسیمم تعداد کاراکتر مجاز ۲۰ می باشد.',
            'alpha'=>'اخطار:نام و نام خانوادگی باید فقط شامل حروف  باشد،بدون فاصله!',
        ]);
        $project = new Project();
        $project -> title = $request -> title;
        $project -> employer_name = $request -> employer_name;
        $project -> employer_national_code = $request -> employer_national_code;
        $project -> employer_mobile = $request -> employer_mobile;
        $project -> address = $request -> address;
        $project -> description = $request -> description;
        $project -> investment_cost = $request -> investment_cost;
        $project -> status = 'fundraising';
        $project ->save();

        return redirect()->route('project.index')->with('success','پروژه جدید با موفقیت ایجاد شد.');
    }

    public function edit($id){
        $project =Project::find($id);
        return view('admin.editProject',['project'=>$project]);
    }

    public function update(Project $project ,Request $request){

        $this -> validate($request,[
            'title' => 'required|string|alpha|min:3|max:30',
            'employer_name' => 'required|string|alpha|min:3|max:30',
            'employer_national_code' => 'required|digits:10|numeric|',
            'employer_mobile' => 'required|numeric|digits:11',
            'address' => 'required|string|max:300',
            'investment_cost' => 'string|numeric',
            'description' => 'required|string|alpha|max:500',
        ],[
            'required' => 'اخطار:این فیلد ضروری است',
            'max' => 'اخطار:ماکسیمم تعداد کاراکتر مجاز ۲۰ می باشد.',
            'alpha'=>'اخطار:نام و نام خانوادگی باید فقط شامل حروف  باشد،بدون فاصله!',
        ]);
        $project -> title = $request -> title;
        $project -> employer_name = $request -> employer_name;
        $project -> employer_national_code = $request -> employer_national_code;
        $project -> employer_mobile = $request -> employer_mobile;
        $project -> address = $request -> address;
        $project -> description = $request -> description;
        $project -> investment_cost = $request -> investment_cost;
//        $project -> status = $request ->status;
        $project ->save();

        return redirect()->route('project.show',$project-> id)->with('success','ویرایش پروژه  با موفقیت انجام گرفت.');
    }

    public function delete(Project $project){
        $project->delete();
    }

    public function storeInvestor(Request $request,$projectId,$userId){
        $project = Project::find($projectId);
        $project->users()->attach($userId);
        $project->save();
        return redirect()->route('/')->with('success','ویرایش پروژه  با موفقیت انجام گرفت.');
    }
}
