<?php
//    $id = null;

    if (isset($_GET['id']) && $_GET['id']) {
        $id = $_GET['id'];
        $id = strtolower(trim(strip_tags($id)));
    }

    if (isset($id) && ('admin' === $id)) {
        header('location: admin/index.php');
    }

    require_once ('_connect.php')
?>



<!DOCTYPE html>
<html lang="en">

<?php
    require_once ('_head.php');
?>

<body>

<?php
    require_once ('_menu.php');

    if (!isset($id) || !$id || !(string)$id) {
        $id = 'index';
    }

    switch ($id) {
        case('blog'):
            include_once('_blog.php');
            break;
        case('blog-single'):
            include_once('_blog_single.php');
            break;
        case('about'):
            include_once('_about.php');
            break;
        case('contact'):
            include_once('_contact.php');
            break;
        default:
            include_once('_index.php');
    }

    require('_footer.php');
?>

  </body>
</html>