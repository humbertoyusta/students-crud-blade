<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Services\StudentsService;

class StudentsController extends Controller
{
    private StudentsService $studentsService;

    /**
     * Constructor
     * Injecting studentsService
     */
    public function __construct(StudentsService $studentsService)
    {
        $this->studentsService = $studentsService;
    }

    /**
     * @return a list of students
     */
    public function findAll() 
    {
        return view('all/index', ['students' => $this->studentsService->findAll()]);
    }

    /**
     * Adds a new student
     * @param $request - a request containing all data of a student
     */
    public function add(Request $request) 
    {
        $this->studentsService->add($request);

        return redirect()->route('student-add')->with('success', 'student added correctly');
    }

    /**
     * @return the view that allows to edit the student
     * @param $id - id of student to edit
     */
    public function getEdit($id)
    {
        return view('edit/index', ['student' => $this->studentsService->findOne($id)]);
    }

    /**
     * Edits a student
     * @redirects to the same edit view with a success message or an error
     * @param $request - a request containing the new data of the student
     */
    public function edit(Request $request, $id)
    {
        $student = $this->studentsService->edit($id, $request);

        return redirect()->route('student-edit', ['id' => $student->id, 'student' => $student])->with('success', 'student edited correctly');
    }

    public function delete($id)
    {
        $this->studentsService->delete($id);

        return redirect()->route('all')->with('success', 'student deleted successfuly');
    }
}
