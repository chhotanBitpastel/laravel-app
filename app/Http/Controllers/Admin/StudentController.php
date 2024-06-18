<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students=Student::get();
        $data=[
            'title' => 'Students',
            'students' => $students 
        ];
        return view('admin.students.index', $data);
    }

    public function add(){
        $data=[
            'title' => 'Student Add'
        ];
        return view('admin.students.add', $data);
    }

    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'studentName' => 'required',
            'rollnumber' => 'required | min:3 | max:10',
            'email' => 'required | email',
            'photo' => 'required|image|max:1024' 
         ]);

         $imageName= time().'.'.$request->photo->extension();
         $request->photo->move(public_path('profiles'), $imageName);
         //dd($imageName);
         $student= new Student;
         $student->name= $request->studentName;
         $student->rollno= $request->rollnumber;
         $student->email= $request->email;
         $student->photo= $imageName;
         $student->save();
         return back()->withSuccess('Student added successfully');
    }

    public function edit($id){
        $student= Student::where('id', $id)->first();
        $data=[
            'title' => 'Student Edit',
            'studentDtl' => $student
        ];
        return view('admin.students.edit', $data);
    }

    public function update(Request $request, $id){
        //dd($request->all());

        $request->validate([
            'studentName' => 'required',
            'rollnumber' => 'required | min:3 | max:10',
            'email' => 'required | email',
            'photo' => 'nullable|image|max:1024' 
         ]);
         $student=Student::where('id', $id)->first();

         if (isset($request->photo)) {
            $imageName= time().'.'.$request->photo->extension();
            $request->photo->move(public_path('profiles'), $imageName);
            $student->photo= $imageName;
         }
         
         $student->name= $request->studentName;
         $student->rollno= $request->rollnumber;
         $student->email= $request->email;
        
         $student->save();
         return back()->withSuccess('Student update successfully');
    }

    public function destroy($id){
        $student= Student::where('id',$id)->first();
        $student->delete();
        return back()->withSuccess('Student deleted successfully');
    }
}
