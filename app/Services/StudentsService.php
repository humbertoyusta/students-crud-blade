<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class StudentsService
{
    /**
     * @param $id
     * @return the student with given $id or null if it doesn't exists
     */
    public function findOne($id)
    {
        return Student::find($id);
    }

    /**
     * @param $email
     * @return the student with given $email or null if it doesn't exists
     */
    public function findOneByEmail($email)
    {
        return Student::where('email', $email)->first();
    }

    /**
     * @return a list of all students
     */
    public function findAll()
    {
        return Student::all();
    }

    /**
     * internal private function to validate a student before adding to the database
     * @param $studentDto -- with all the data of the student
     * @throws a validation errror if validation fails
     */
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

    /**
     * @param $studentDto -- with all the data of the student
     * @return $student -- the student added to the database
     * @throws a validation errror if validation fails
     * @throws ConflictHttpException -- if there is another user with the same email
     */
    public function add($studentDto)
    {
        $this->validate($studentDto);

        if ($this->findOneByEmail($studentDto->email))
        {
            throw new ConflictHttpException();
        }

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

    /**
     * @param $id -- id of the student to edit
     * @param $studentDto -- with all the data of the student
     * @return $student -- the student added to the database
     * @throws a validation errror if validation fails
     * @throws ConflictHttpException -- if there is another user with the same email
     */
    public function edit($id, Request $studentDto)
    {
        assert($id === $studentDto->id);

        $this->validate($studentDto);

        if ($this->findOneByEmail($studentDto->email))
        {
            throw new ConflictHttpException();
        }

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