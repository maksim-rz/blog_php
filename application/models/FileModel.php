<?php


class FileModel
{
    public function render(string $file, array $vars = []): string
    {
        extract($vars);
        ob_start();
        include $file;
        return ob_get_clean();
    }
}