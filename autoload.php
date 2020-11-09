<?php

function  myAutoload ($class) {
    $path = sprintf('src/classes/%s.php', $class);

    if (file_exists($path)) {
        return require ($path);
    }

    echo 'class ' . $class . ' doesnot exist';
}

spl_autoload_register('myAutoload');

$myClassA = new MyClassA();
$myClassB = new MyClassB();
$myClassC = new MyClassC();