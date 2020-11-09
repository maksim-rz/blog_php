<?php


class ConfigModel
{
    private $settings = [];

    public function __construct(string $file)
    {
        if (!file_exists($file)) {
            throw new Exception('Unable to find file at path: ' . $file . '.');
        }

        if (!$settings = parse_ini_file($file, TRUE)) {
            throw new Exception('Unable to open ' . $file . '.');
        }

        $this->settings = $settings;
    }


    public function getSettings(?string $key = null)
    {
        if (!$key) {
            return $this->settings;
        }

        if (isset($this->settings[$key])) {
            return $this->settings[$key];
        }

        return null;

    }
}