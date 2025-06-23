<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    function getStudents(){
      $students = Student::all();
      return view('students',['students' => $students]);
    }
}
