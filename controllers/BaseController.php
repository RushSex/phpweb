<?php
class BaseController {
    protected $viewPath;

    public function render($view, $data = []) {
        extract($data);
        $filePath = __DIR__ . "/../views/{$view}.php";
        if (file_exists($filePath)) {
            include $filePath;
        } else {
            echo "Шаблон не найден: {$view}";
        }
    }
}