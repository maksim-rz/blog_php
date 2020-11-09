<?php


abstract class BaseController
{
    protected $baseTemplateVariables = [];

    private $fc;

    private $model;

    private $db;

    protected $baseTemplate = 'article/base.php';

    public function __construct()
    {
        $this->fc = FrontController::getInstance();
        $this->model = new FileModel();
        $this->db = DBModel::getInstance();
    }

    public function pageNotFound()
    {
        throw new Exception('Page not found');
    }

    public function getParamName(string $key)
    {
        $prams = $this->getParams();

        return (!empty($prams) && !empty($prams[$key])) ? $prams[$key] : null;
    }

    /**
     * @return FileModel
     */
    protected function getModel(): FileModel
    {
        if ($this->model && $this->model instanceof FileModel) {
            return $this->model;
        }

        $this->model = new FileModel();

        return $this->model;
    }

    protected function render(string $content, bool $withMenu = true, bool $addBlock = true)
    {
        $model = $this->getModel();

        $this->addBaseTemplateVariables([
            'baseContent' => $content,
            'menu' => $withMenu ? $this->renderMenu() : '',
            'addBlock' => $addBlock
        ]);


        $body = $model->render($this->baseTemplate, $this->baseTemplateVariables);

        $this->fc->setBody($body);
    }

    protected function renderMenu()
    {
        return $this->getModel()->render('article/menu.php');
    }

    protected function getParams()
    {
        return $this->fc->getParams();
    }

    protected function addBaseTemplateVariables(array $variables)
    {
        return $this->baseTemplateVariables = array_merge($this->baseTemplateVariables, $variables);
    }

    protected function isPostRequest()
    {
        return 'POST' === $_SERVER['REQUEST_METHOD'];
    }

    protected function redirect(string $path = '') {
        header(sprintf('location: %s', $path));
        exit();
    }
}