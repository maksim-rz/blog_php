<?php


class IndexController
{
    public function indexAction()
    {
        $rc = FrontController::getInstance();

        $rc->setBody('<h1> Hello from index action</h1>');
    }
}