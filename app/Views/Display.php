<?php

namespace App\Views;

class Display{
    static function message($message, $type)
    {
        echo "<div>$message</div>";
    }
}