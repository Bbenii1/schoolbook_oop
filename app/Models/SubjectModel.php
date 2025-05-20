<?php

namespace App\Models;

class SubjectModel extends Model
{
    public ?string $subject = null;
    protected static $table = 'subjects';

    public function __construct(?string $name = null)
    {
        parent::__construct();
        if ($name != null) {
            $this->subject = $name;
        }
    }
}
/* creating a new subject:
$subject = new Subject("Honvédelmi alapismeretek");
$subject->create();
*/