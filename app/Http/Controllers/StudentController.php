<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\student as ModelsStudent;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    //
    public function get_all_student(){
        $students = Student::all();
        return view('student_manage' ,['students' => $students]);
    }
   
    public function create(){

        return view('student_add');
    }

    public function store(Request $request)
    {
        $newPost = Student::create([
            'fullname' => $request->fullname,
            'birthday' => $request->birhtday,
            'address' => $request->address
        ]);
        
        return redirect('student/' . $newPost->id . '/edit');
    }
    public function show(Student $student)
    {
        //
    }

    public function get_student_by_id( $id){
        $students = student::find($id);
        return view('student_edit', compact('students'));
    }

    public function edit( Request $request ,Student $id){


        $id->update([
            'fullname' => $request->fullname,
            'address' => $request->address ,
        ]);

        $student = Student::all();
        return redirect()->route('listStudent_UI')->with('success', 'SUCCESS EDIT!');
    }



    public function add_student(){

        return view('student_add');

    }
    public function add_member(Request $resquest){
       
        $input = $resquest->all();
        student::add($input);

         return redirect()->route('listStudent_UI')->with('success', 'SUCCESS ADD!');
    }


    public function destroy($id)
    {
        $student = student::find($id);
        $student->delete();
        return redirect()->route('listStudent_UI')->with('delete', 'SUCCESS DELETE!');
    }

}   
