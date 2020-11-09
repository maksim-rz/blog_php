<?php
session_start();

if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] === true)) {
    return;
}

header('location: login.php');
exit();