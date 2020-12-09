<?php


class IndexController extends BaseController
{
    public function indexAction()
    {
  //      $rc = FrontController::getInstance();

  //      $rc->setBody('<h1> Hello from index action</h1>');

        $index = $this->getModel()->render('article/index.php', [

        ]);

        $this->render($index);
    }
}