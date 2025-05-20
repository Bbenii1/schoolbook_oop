<?php

namespace App\Models;

class ClassModel extends Model
{
    public ?string $class = null;
    public ?int $schoolYear = null;

    protected static $table = 'classes';

    public function __construct(?string $class = null, ?int $schoolYear = null)
    {
        parent::__construct();
        if ($class != null) {
            $this->class = $class;
        }
        if ($schoolYear != null) {
            $this->schoolYear = $schoolYear;
        }
    }
}