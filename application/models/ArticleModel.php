<?php


class ArticleModel
{
    public const IMAGE_FOLDER = 'images';

    private $db;

    private $connection;
    /**
     * ArticleModel constructor.
     */
    public function __construct()
    {
        $this->db = DBModel::getInstance();
        $this->connection = $this->db->getConnection();
    }

    public function getArticleById(int $id): ?Article
    {
        $articleSql = sprintf('SELECT * FROM articles WHERE id = %d', $id);

        $stmt = $this->connection->query($articleSql);
        $stmt->setFetchMode(PDO::FETCH_CLASS,  'Article');
        $article = $stmt->fetch();

        return $article ? : null;
    }

    public function getArticleList(): array
    {
        $articleSql = sprintf('SELECT * FROM articles ');

        $stmt = $this->connection->query($articleSql);

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
    }

    public function updateArticle(Article $article)
    {
        $sql = sprintf("UPDATE articles SET title = :title, content = :content, image = :image,  category = :category WHERE id = :id");

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('title', $article->getTitle());
        $stmt->bindValue('content', $article->getContent());
        $stmt->bindValue('category', $article->getCategory());
        $stmt->bindValue('image', $article->getImage());
        $stmt->bindValue('id', $article->getId());
        $stmt->execute();

        return;
    }

    public function deleteArticleById(int $id)
    {
        $sql = sprintf("DELETE FROM articles WHERE id = :id");
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $stmt->execute();

        return;
    }

    public function createArticle(Article $article)
    {
        $sql = sprintf('INSERT INTO articles (title, content, image, category) VALUES (:title, :content, :image, :category)');
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('title', $article->getTitle());
        $stmt->bindValue('content', $article->getContent());
        $stmt->bindValue('category', $article->getCategory());
        $stmt->bindValue('image', $article->getImage());
        $stmt->execute();
        if ($stmt->execute()) {
            return $this->connection->lastInsertId();
        }

        return null;
    }

    public function uploadImage(string $fieldName, string $folderName)
    {
        if (isset($_FILES[$fieldName]) &&  is_array($_FILES[$fieldName])) {
            if (UPLOAD_ERR_OK === $_FILES[$fieldName]['error']) {
                if (!file_exists($folderName)) {
                    if (!mkdir($folderName, 0777, true)) {
                        throw new Exception(sprintf('Cant\'t create folder with name "%s" for upload images', $folderName));
                    }
                }
                $fileName = $_FILES[$fieldName]['name'];
                $tmp = $_FILES[$fieldName]['tmp_name'];

                if (move_uploaded_file($tmp, sprintf('%s/%s', $folderName, $fileName))) {
                    return $fileName;
                } else {
                    throw new Exception('Cant\'t move uploaded file');
                }

            } else {
                throw new Exception('Upload file error');
            }
        }

        return null;
    }
}