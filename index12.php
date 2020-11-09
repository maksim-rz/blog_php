<?php
define('UPLOAD_FOLDER', 'upload');


function fileList(string $path): array
{
    $dir = opendir($path);

    $res = [];

    while ($name = readdir($dir)) {
        if (in_array($name, ['.', '..'])) {
            continue;
        }

        if (!is_dir($name)) {
            $res[] = $name;
        }
    }

    return $res;
}

//    header('Content-Disposition: attachment; filename="myFile.jpg"');
//header('Expires: '. date('r', time()+5));
//echo date('H:i:s');

//exit;
//
//$x = 'abcd1';
//
//
//var_dump( md5($x) === '1e271dbbc6de37b88308beac259f40c0');


//var_dump(file_exists(__DIR__ . '/readme2'));
//var_dump(realpath(__DIR__ . ''));



//exit;


ob_start();

session_start();

//$file = file_get_contents('our-users.txt');

// exit();

    $welcome = 'Ви новий кроистувач';

    if (!empty($_COOKIE['userName'])) {
        $welcome = $_COOKIE['userName'];
    }

//    header('Location: http://localhost');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['avatar']) &&  is_array($_FILES['avatar'])) {
        if (UPLOAD_ERR_OK === $_FILES['avatar']['error']) {
            if (!file_exists(UPLOAD_FOLDER)) {
                mkdir(UPLOAD_FOLDER);
            }
            $fileName = $_FILES['avatar']['name'];
            $tmp = $_FILES['avatar']['tmp_name'];

            move_uploaded_file($tmp, sprintf('%s/%s', UPLOAD_FOLDER, $fileName));

        } else {
            echo 'Something went wrong!';
        }

    }
}

    if (isset($_POST['files']) && ($file = (string) $_POST['files'])) {
        $fullPath = sprintf('%s/%s', UPLOAD_FOLDER, $file);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    if (isset($_POST['name']) && $_POST['name']) {
        $name = trim(strip_tags($_POST['name']));
        setcookie('userName', $name, time()+30);
        $welcome = $name;

        $age = $_POST['age'] ?? '';

        $_SESSION['name'] = $name;
        $_SESSION['age'] = $age;

        $data = sprintf('Name: %s | Age: %s %s', $name, $age, PHP_EOL);
        file_put_contents('our-users.txt', $data, FILE_APPEND);

//        header('Refresh: 5; https://www.php.net/manual/ru/function.time.php');

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Location: ' . $_SERVER['PHP_SELF']);
        header('HTTP/1.1 301 Moved permanently');

        exit;
    }

ob_end_clean();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>
    Hello!!!
    <?php
        echo $welcome;
    ?>

    Session values:
    <?php
//    var_dump($_SESSION);
    session_destroy();

    echo $_SESSION['name'] ?? '', ' | ', $_SESSION['age'] ?? '';
    ?>
</h1>

<form action="" method="post" enctype="multipart/form-data">
    <label for="name-id">Name</label>
    <input id="name-id" type="text" name="name">
    <br>
    <label for="age-id">Age</label>
    <input id="age-id" type="text" name="age">
    <br>
    <label for="age-id">Avatar</label>
    <input type="file" name="avatar">
    <br>
    <input type="submit" value="SEND">
</form>
<hr>

<form action="" method="post">
    <select name="files" id="">
        <?php
            if ($files = fileList(UPLOAD_FOLDER)) {
                foreach ($files as $file) {
                    echo sprintf('<option value="%s">%s</option>', $file, $file);
                }
            }
        ?>
    </select>
    <input type="submit" value="Delete">
</form>

<br>

<a href="#">Download</a>

<?php

//if (file_exists('our-users.txt')) {
//    $myFile = fopen('our-users.txt', 'r');
//    while ($row = fgets($myFile)) {
//        echo $row, '<br>';
//    }
//
//    fclose($myFile);
//}

//$newFolder = 'myFolder2';

//if (file_exists($newFolder)) {
//    rmdir($newFolder);
//
////    mkdir('myFolder2');
////    echo sprintf('We created folder %s', $newFolder);
//    echo sprintf('We deleted folder %s', $newFolder);
//} else {
//    echo sprintf('Folder %s already deleted', $newFolder);
//}

//$dir = opendir('.');
//
//echo '<ul>';
//while($name = readdir($dir)) {
//    if (in_array($name, ['.', '..'])) {
//        continue;
//    }
//
//    if (is_dir($name)) {
//        echo sprintf('<li><b>[%s]</b></li>', $name);
//    } else {
//        echo sprintf('<li>%s</li>', $name);
//    }
//}
//echo '</ul>';
//
////closedir($dir);
//
//$currentFolder = scandir('.');
//
//foreach ($currentFolder as $name) {
//    if (in_array($name, ['.', '..'])) {
//        continue;
//    }
//
//    if (is_dir($name)) {
//        echo sprintf('<li><b>[%s]</b></li>', $name);
//    } else {
//        echo sprintf('<li>%s</li>', $name);
//    }
//}

?>

</body>
</html>

