<?php


class ArticleController extends BaseController
{
    public function indexAction()
    {
        $index = $this->getModel()->render('article/index.php', [

        ]);

        $this->render($index);
    }

    public function blogAction()
    {
        $articleModel = new ArticleModel();

        $articles = $articleModel->getArticleList();

        $blog = $this->getModel()->render('article/blog.php', [
            'articles' => $articles,
        ]);

        $this->render($blog);
    }

    public function singleAction()
    {
        $id = $this->getParamName('id');

        if (!$id) {
            $this->pageNotFound();
        }

        $articleModel = new ArticleModel();

        $article = $articleModel->getArticleById($id);

        $blogSingle = $this->getModel()->render('article/blog_single.php', [
            'article' => $article,
        ]);

        $this->render($blogSingle);
    }
}