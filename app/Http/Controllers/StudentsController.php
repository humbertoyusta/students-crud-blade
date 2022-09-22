<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Services\StudentsService;

class StudentsController extends Controller
{
    private StudentsService $studentsService;

    public function __construct(StudentsService $studentsService)
    {
        $this->studentsService = $studentsService;
    }

    /**
     * Returns a list of students showing only name and email
     */
    public function findAll() {
        return view('all/index', ['students' => $this->studentsService->findAll()]);
    }

    /**
     * Adds a new student
     */
    public function add(Request $request) {

        $this->studentsService->add($request);

        return redirect()->route('student-add')->with('success', 'student added correctly');
    }
}
