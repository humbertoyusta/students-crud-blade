<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    /**
     * Returns a list of students showing only name and email
     */
    public function findAll() {
        $students = Student::all();

        return view('all/index', ['students' => $students]);
    }

    /**
     * Adds a new student
     */
    public function add(Request $request) {

        $request->validate([
            'firstname' => 'required|max:120|min:1',
            'lastname' => 'required|max:120|min:1',
            'email' => 'required|max:255|min:3',
            'address' => 'required|min:1',
            'score' => 'required|min:0'
        ]);

        $student = new Student;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->score = $request->score;
        $student->save();

        return redirect()->route('student-add')->with('success', 'student added correctly');
    }
}
