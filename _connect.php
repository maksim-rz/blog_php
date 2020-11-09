<?php

//echo 'Connection successfully!';
function getConnection() {
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
