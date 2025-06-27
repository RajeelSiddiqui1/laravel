<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    function addStudents(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        if ($student) {
            $request->session()->flash('message', 'New Student added sucessfully');
            return redirect('students');
        } else {
            $request->session()->flash('message', 'Operation has been faild');
            return redirect('students');
        }
    }

    function studentList()
    {
        $students = Student::paginate(4);
        return view('students', ['students' => $students]);
    }

    function editStudent($id)
    {
        $student = Student::find($id);
        return view('edit-student', ['data' => $student]);
    }

    function updateStudent(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        if ($student->save()) {
            $request->session()->flash('message', 'User update successfully');
            return redirect('students');
        } else {
            $request->session()->flash('message', 'Operation has been faild');
            return redirect('students');
        }
    }
    function deleteStudent(Request $request, $id)
    {
        $isDeleted = Student::destroy($id);
        if ($isDeleted) {
            $request->session()->flash('message', 'Student deleted successfully');
            return redirect('students');
        } else {
            $request->session()->flash('message', 'Operation has been faild');
            return redirect('students');
        }
    }

    function searchStudents(Request $request)
    {
        $search = $request->search;

        $studentData = Student::where('name', 'like', "%{$search}%")->paginate(4)
            ->withQueryString();

        return view('students', [
            'students' => $studentData,
            'search' => $search
        ]);
    }


    function deleteMultiple(Request $request)
    {
        $result = Student::destroy($request->ids);
        if (!$result) {
            $request->session()->flash('message', 'Operation failed');
            return redirect('students');
        } else {
            $request->session()->flash('message', 'Multiple data delete successfully');
            return redirect('students');
        }
    }
}
