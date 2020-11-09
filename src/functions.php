<?php

function connection()
{
    $servername = 'db';
    $username = 'root';
    $password = 'test1_root';
    $dbname = 'test1';

    $connection = mysqli_connect($servername, $username, $password, $dbname);

    if ($connection->connect_error) {
        die(sprintf('Connection failed: %s', $connection->connect_error));
    }

    $connection->set_charset('utf8');
    return $connection;
}

function debug($param)
{
    var_dump($param);
    exit;
}

function redirect(string $path = 'index.php') {
    header(sprintf('location: %s', $path));
    exit();
}

function getCategories($connection = null): ?array
{
    if (!$connection) {
        $connection = connection();
    }

    $categorySql = sprintf('SELECT * FROM categories');

    $result = $connection->query($categorySql);

    if ($result) {
        $categories = $result->fetch_all(MYSQLI_ASSOC);
        $result->close();
    }

    return $categories ?? null;
}
