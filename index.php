<?php
set_include_path(
    get_include_path()
    .PATH_SEPARATOR.'application/controllers'
    .PATH_SEPARATOR.'application/models'
    .PATH_SEPARATOR.'application/views'
    .PATH_SEPARATOR.'application/entity'
);

define('MAIN_CONFIG', 'configs/config.ini');

function  myAutoload ($class) {
    return include_once($class.'.php');
}

spl_autoload_register('myAutoload');

try {
    $fc = FrontController::getInstance();

    $fc->route();
    echo $fc->getBody();
} catch (Exception $e) {
    $model = new FileModel();
    echo $model->render('errors/not_found.php', [
        'message' => $e->getMessage(),
    ]);
}


exit;
