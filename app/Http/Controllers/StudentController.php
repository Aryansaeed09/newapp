<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Minus;

class StudentController extends Controller
{
    public function index() {

        $students= student::all();
        
        return view("student.index",["students"=>$students]);
    }

    public function createForm() {
        return view("student.createForm");
    }

    public function storeStudent(Request $request) {

        $request->validate([
                'name'=>'required|max:20',
                'age'=>'required',
                'city'=>'required|max:40',
                'image'=>'required|mimes: jpg,pnj,jpeg|max:2048',

                $path=$request->file('image')->store('uploads','public'),
        ]);

        Student::create([
          'name' => $request->input('name'),
          'age' => $request->input('age'),
          'city' => $request->input('city'),
          'image' =>$path,
        ]);
        return redirect()->route("student.index");

               
    }
    public function delete($id){

        $student= Student::findOrFail($id);

        if($student->image && Storage::disk('public')->exists($student->image)){
            Storage::disk('public')->delete($student->image);
        }
        
        $student->delete($id);
        return redirect()->route("student.index")->with("success","One Studend Deleted Successfully ");
    }
       
    public function update($id) {

        $student= Student::findOrFail($id);

        return view("student.update",["students"=>$student]);

               
    }

    public function edit(Request $request,$id) {

        $student= Student::findOrFail($id);

        $request->validate([
            'name' => "required|max:60",
            'age' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048'

        ]);
    }
}
