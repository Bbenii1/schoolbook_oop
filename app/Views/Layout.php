<?php

namespace App\Views;

class Layout
{
    public static function header($title = "Iskola"):void
    {
        echo <<<HTML
                <!doctype html>
                <html lang="en">
                <head>
                <meta charset="UTF-8">
                             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
                             <title>$title</title>
                             <link rel="stylesheet" href="style.css">
                             <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
                </head>
                <body>
            HTML;
        self::navbar();
        self::handleMessage();
        echo "<div class='container'>";
    }

    public static function handleMessage():void{
        //TODO
    }

    public static function navbar():void
    {
        echo <<<HTML
                <nav class="navbar">
                <ul class="nav-list">
                    <li class="nav-button"><a href="/"><button style="button" title="Kezdőlap">Kezdőlap</button></a></li>
                    <li class="nav-button"><a href="/subjects"><button style="button" title="Tantárgyak">Tantárgyak</button></a></li>
                    <li class="nav-button"><a href="/classes"><button style="button" title="Osztályok">Osztályok</button></a></li>
                </ul>
                </nav>
                HTML;
    }

    public static function footer():void
    {
        echo <<<HTML
                </div>
                    <footer>
                        <hr>
                        <p>2025 &copy; Szlonkai Benedek</p>
                    </footer>
                </body>
                </html>
                HTML;
    }
}