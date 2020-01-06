<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{

    public function index()
    {
        $data = [
              'students' => Student::orderBy('name')->get()
        ];

        return view('admin.student.index')->with($data);
    }


    public function create()
    {
        return view('admin.student.create');
    }


    public function store(Request $request)
    {
        $studentData = $this->validation();
        if (Student::create($studentData)){
            Session::flash('success','New Student Added successfully!');
            return redirect()->route('student.index');
        }else{
            Session::flash('error','Something went wrong!');
            return redirect()->route('student.create');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    private function validation()
    {
        return request()->validate([
            'name'   => 'required',
            'roll'   => 'required|unique:students|min:3'
        ]);
    }
}
