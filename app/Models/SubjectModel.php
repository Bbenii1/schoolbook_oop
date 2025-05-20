<?php

namespace App\Models;

class SubjectModel extends Model
{
    public string|null $subject = null;

    protected static $table = 'subjects';

    public function __construct(?string $name = null)
    {
        parent::__construct();
        if ($name) {
            $this->subject = $name;
        }
    }
}

//új tantárgy létrehozása:
//$subject = new Subject('honismeret');
//$subject->create();