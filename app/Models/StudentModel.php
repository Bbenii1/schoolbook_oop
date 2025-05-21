<?php

namespace App\Models;

class StudentModel extends Model
{
    public string|null $firstName = null;
    public string|null $lastName = null;
    public string|null $gender = null;
    public int|null $classID = null;

    protected static $table = 'students';

    public function __construct(?string $firstName = null, ?string $lastName = null, ?string $gender = null, ?int $classID = null)
    {
        parent::__construct();
        if ($firstName) {
            $this->firstName = $firstName;
        }

        if ($lastName) {
            $this->lastName = $lastName;
        }
        if ($gender) {
            $this->gender = $gender;
        }
        if ($classID) {
            $this->classID = $classID;
        }
    }
}

//új tantárgy létrehozása:
//$subject = new Subject('honismeret');
//$subject->create();