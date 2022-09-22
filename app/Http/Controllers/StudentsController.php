<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    /**
     * Adds a new student
     */
    public function add(Request $request) {

        $request->validate([
            'firstname' => 'required|max:120',
            'lastname' => 'required|max:120',
            'email' => 'required|max:255',
            'address' => 'required',
            'score' => 'required'
        ]);

        $student = new Student;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->score = $request->score;
        $student->save();

        return redirect()->route('main')->with('success', 'student added correctly');
    }
}
