<?php
namespace App\Views;

class Display
{
    static function message(string $message)
    {
        echo <<<HTML
    <div style="position: relative; padding: 10px; margin: 10px 0;">
        <button onclick='window.location.href = "/";'>×</button>
        <p>$message</p>
    </div>
HTML;
    }
}