<?php

namespace App\Models;

class ClassModel extends Model
{
    public string|null $class = null;

    public int|null $schoolYear = null;

    protected static $table = 'classes';

    public function __construct(?string $class = null, ?int $year = null)
    {
        parent::__construct();
        if ($class) {
            $this->class = $class;
        }

        if ($year) {
            $this->schoolYear = $year;
        }

    }
}
