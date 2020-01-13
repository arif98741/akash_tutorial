<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;


class StudentController extends Controller
{

    public function index()
    {
        $data = [
            //'students' => Student::orderBy('name')->get()
            'students' => Student::with(['department'])->get()
        ];
        //return $data['students'];

        return view('admin.student.index')->with($data);
    }


    public function create()
    {
        $data = [
            'departments' => Department::orderBy('department_name', 'asc')->get()
        ];
        return view('admin.student.create')->with($data);
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
        //je konokichu
    }


    public function edit(Student $student)
    {

        $data = [
            'student' => $student,
            'departments' => Department::orderBy('department_name', 'asc')->get()
        ];
        return view('admin.student.edit')->with($data);
    }

    public function update(Request $request, Student $student)
    {
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->department_id = $request->department_id;
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
            'roll'   => 'required|unique:students|min:3',
            'department_id'   => 'required',
        ]);
    }
}