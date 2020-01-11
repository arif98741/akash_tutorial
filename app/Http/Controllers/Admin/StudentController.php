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
        if (Student::create($studentData)) {
            Session::flash('success', 'New Student Added successfully!');
            return redirect()->route('student.index');
        } else {
            Session::flash('error', 'Something went wrong!');
            return redirect()->route('student.create');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(Student $student)
    {
        $data = [
            'student' => $student
        ];
        return view('admin.student.edit')->with($data);
    }


    public function update(Request $request, Student $student)
    {
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->status = $request->status;

        if ($student->save()) {
            Session::flash('success', 'Student Updated successfully!');
            return redirect()->route('student.index');
        } else {
            Session::flash('error', 'Something update wrong!');
            return redirect()->route('student.index');
        }
    }


    public function destroy(Student $student)
    {
        if ($student->delete()) {
            Session::flash('success', 'Student deleted successfully!');
            return redirect()->route('student.index');
        } else {
            Session::flash('error', 'Something delete wrong!');
            return redirect()->route('student.index');
        }
    }

    private function validation()
    {
        return request()->validate([
            'name'   => 'required',
            'roll'   => 'required|unique:students|min:3'
        ]);
    }
}