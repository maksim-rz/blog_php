<?php


class Article
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getArticleById(int $id)
    {
        $articleSql = sprintf('SELECT * FROM articles WHERE id = %d', $id);

        $result = $this->connection->query($articleSql);

        if ($result) {
            $article = $result->fetch_array(MYSQLI_ASSOC);
            $result->close();
        }

        return $article ?? null;
    }

    function updateArticleById(int $id, string $title, int $category, string $content)
    {
        if (empty($category)) {
            $category = 'NULL';
        }

        $sql = sprintf("UPDATE articles SET title = '%s', content = '%s', image = '%s',  category = %s WHERE id = %d", $title, $content, '', $category,  $id);

        return $this->connection->query($sql);

    }
}