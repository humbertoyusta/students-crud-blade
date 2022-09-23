<?php

namespace App\Services;

use App\Models\Student;

class StudentsService
{
    public function findOne($id): Student
    {
        return Student::find($id);
    }

    public function findAll()
    {
        return Student::all();
    }

    public function add($studentDto) 
    {
        $studentDto->validate([
            'firstname' => 'required|max:120',
            'lastname' => 'required|max:120',
            'email' => 'required|max:255',
            'address' => 'required',
            'score' => 'required|min:0'
        ]);

        $student = new Student([
            'firstname' => $studentDto->firstname,
            'lastname' => $studentDto->lastname,
            'email' => $studentDto->email,
            'address' => $studentDto->address,
            'score' => $studentDto->score
        ]);
        $student -> save();
    }
}