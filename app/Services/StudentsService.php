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
            'firstname' => 'required|max:120|min:1',
            'lastname' => 'required|max:120|min:1',
            'email' => 'required|max:255|min:3',
            'address' => 'required|min:1',
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