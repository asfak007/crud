<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public $students;
    public function add(Request $request)
    {
        Student::newStudent($request);
        return redirect()->back()->with('message','student add sucessfull');

    }
//    public function manage(){
//        $this->students = Student::all();
//        return view('dashboard.manage',['students' => $this->students]);
//    }
public function manageStudent(){
        return view('dashboard.manage');
}
    public function edit($id)
    {
        $this->blog = Blog::find($id);
        return view('blog.edit',['blog'=>$this->blog]);
    }
    public function update(Request $request,$id)
    {
        Blog::updateblog ($request,$id);
        return redirect('/manage-blog')->with('message','update blog sucessfull');
    }
    public function delete($id){
        Student::deleteStudent($id);
        return redirect()->back()->with('message','Delete blog sucessfully');
    }
}
