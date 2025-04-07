<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {

        $students= student::all();
        
        return view("student.index");
    }

    public function createForm() {
        return view("student.createForm");
    }

    public function storeStudent(Request $request) {

        $request->validate([
                'name'=>'required|max:20',
                'age'=>'required',
                'city'=>'required|max:40'
        ]);

        Student::create($request->all());

        return redirect()->route("student.index");

               
    }
}
