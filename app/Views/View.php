<?php

namespace App\Views;
use App\Views\Layout;

class View
{
    public static function render(string $view, array $data = [], bool $useLayout = true): void
    {
        $viewFile = self::resolveViewPath($view);

        if (!file_exists($viewFile)) {
            self::handleMissingView($viewFile);
            return;
        }

        if($useLayout) {
            Layout::header($data['title'] ?? 'Iskola');
        }

        extract($data);
        include $viewFile;

        if ($useLayout)
        {
            Layout::footer();
        }
    }

    private static function resolveViewPath(string $view): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . "$view";
    }

    private static function handleMissingView(string $viewFile): void
    {
        error_log("View not found: " . $viewFile);
        Display::message($viewFile . " not found.", 'error');
    }
}