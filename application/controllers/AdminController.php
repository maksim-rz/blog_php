<?php


class AdminController extends BaseController
{
    protected $baseTemplate = 'admin/base.php';

    private $securityModel;

    private $authorizedUser;

    public function __construct()
    {
        parent::__construct();
        $this->securityModel = new SecurityModel;
        $this->authorizedUser = $this->securityModel->getLoggedInUser();
    }

    public function indexAction()
    {
        $this->securityModel->checkLogin();

        $articleModel = new ArticleModel();

        $articles = $articleModel->getArticleList();
        $header = $this->renderHeader('Dashboard', 'bg-primary', 'fa-gear');

        $this->addBaseTemplateVariables([
            'header' => $header,
        ]);

        $index = $this->getModel()->render('admin/index.php', [
            'articles' => $articles,
        ]);

        $this->render($index);
    }

    public function arteditAction()
    {
        $this->securityModel->checkLogin();

        $articleModel = new ArticleModel();

        if ($this->isPostRequest()) {
            $article = new Article();
            $id = (int)($_POST['id'] ?? 0);
            $article->setId($id);
            $article->setTitle($_POST['title'] ?? '');
            $article->setCategory(!empty($_POST['category']) ? $_POST['category'] : null);
            $article->setContent($_POST['content'] ?? null);
            $article->setImage($articleModel->uploadImage('file', ArticleModel::IMAGE_FOLDER));
            $articleModel->updateArticle($article);
            $this->redirect($_SERVER['REQUEST_URI']);
        }

        $categoryModel = new CategoryModel();
        $id = (int)$this->getParamName('id');

        if (!$id) {
            $this->pageNotFound();
        }

        $article = $articleModel->getArticleById($id);

        if (!$article) {
            $this->pageNotFound();
        }

        $header = $this->renderHeader('Article #'. $id, 'bg-primary');

        $this->addBaseTemplateVariables([
            'header' => $header,
        ]);

        $categories = $categoryModel->getCategoryList();

        $index = $this->getModel()->render('admin/edit_article.php', [
            'article' => $article,
            'categories' => $categories,
        ]);

        $this->render($index);
    }

    public function artdeleteAction()
    {
        $this->securityModel->checkLogin();

        $id = (int)$this->getParamName('id');

        if (!$id) {
            $this->redirect('/admin');
        }

        $articleModel = new ArticleModel();
        $articleModel->deleteArticleById($id);

        $this->redirect('/admin');
    }

    public function artcreateAction()
    {
        $this->securityModel->checkLogin();

        if ($this->isPostRequest()) {
            $articleModel = new ArticleModel();
            $article = new Article();
            $article->setTitle($_POST['title'] ?? '');
            $article->setCategory(!empty($_POST['category']) ? $_POST['category'] : null);
            $article->setContent($_POST['content'] ?? null);
            $article->setImage($articleModel->uploadImage('file', ArticleModel::IMAGE_FOLDER));
            $articleModel->createArticle($article);
        }

        $this->redirect('/admin');
    }

    public function loginAction()
    {
        $emailError = $passwordError =  '';
        $user = new User();

        if ($this->isPostRequest()) {
            $user->setEmail($_POST['email'] ?? '');
            $user->setPassword($_POST['password'] ?? '');

            if (!$user->getEmail()) {
                $emailError = 'Please enter email';
            }

            if (!$user->getPassword()) {
                $passwordError = 'Please enter password';
            }

            if (!$emailError && !$passwordError) {
                $userModel = new UserModel();

                /** @var User $userResult */
                $userResult = $userModel->getUserByEmail($user->getEmail());

                if ($userResult) {
                    if (password_verify($user->getPassword(), $userResult->getPassword())) {
                        $this->securityModel->setLoggedIn($userResult);

                        $this->redirect('/admin');
                    } else {
                        $emailError = 'Incorrect login or password';
                    }
                } else {
                    $emailError = 'User not exist';
                }
            }
        }

        $header = $this->renderHeader('Login', 'bg-primary', '', false);

        $this->addBaseTemplateVariables([
            'header' => $header,
        ]);

        $login = $this->getModel()->render('admin/login.php', [
            'article' => null,
            'categories' => [],
            'isSubmitted' => $this->isPostRequest(),
            'emailError' => $emailError,
            'passwordError' =>$passwordError,
            'user' => $user
        ]);

        $this->render($login, false, false);
    }

    public function logoutAction()
    {
        session_destroy();
        $this->redirect('/admin/login');
    }

    /**
     * @return string
     */
    protected function renderMenu()
    {
        return $this->getModel()->render('admin/menu.php', [
            'authorizedUser' => $this->authorizedUser,
        ]);
    }

    /**
     * @param string $caption
     * @param string $colorClass
     * @param string $iconClass
     * @param bool $addBlock
     * @return string
     */
    protected function renderHeader(string $caption = '', $colorClass = '', string $iconClass = '', bool $addBlock = true)
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategoryList();

        return $this->getModel()->render('admin/header.php', [
            'caption' => $caption,
            'colorClass' => $colorClass,
            'iconClass' => $iconClass,
            'categories' => $categories,
            'addBlock' => $addBlock,
        ]);
    }
}