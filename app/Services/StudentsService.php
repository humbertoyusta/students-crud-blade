<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentsService
{
    public function findOne($id)
    {
        return Student::find($id);
    }

    public function findAll()
    {
        return Student::all();
    }

    private function validate($studentDto)
    {
        $studentDto->validate([
            'firstname' => 'required|max:120',
            'lastname' => 'required|max:120',
            'email' => 'required|max:255',
            'address' => 'required',
            'score' => 'required|min:0'
        ]);
    }

    public function add($studentDto)
    {
        $this->validate($studentDto);

        $student = new Student([
            'firstname' => $studentDto->firstname,
            'lastname' => $studentDto->lastname,
            'email' => $studentDto->email,
            'address' => $studentDto->address,
            'score' => $studentDto->score
        ]);

        $student -> save();
        return $student;
    }

    public function edit($id, Request $studentDto)
    {
        $this->validate($studentDto);

        return tap(DB::table('students')->where("id", $id)) -> 
            update([
                'firstname' => $studentDto->firstname,
                'lastname' => $studentDto->lastname,
                'email' => $studentDto->email,
                'address' => $studentDto->address,
                'score' => $studentDto->score
            ]) -> first();
    }

    public function delete($id)
    {
        return Student::destroy($id);
    }
}