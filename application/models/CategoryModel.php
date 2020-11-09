<?php


class CategoryModel
{
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

    public function getCategoryById(int $id)
    {
        $articleSql = sprintf('SELECT * FROM categories WHERE id = %d', $id);

        $stmt = $this->connection->query($articleSql);
        $stmt->setFetchMode(PDO::FETCH_CLASS,  'Category');

        return $stmt->fetch();
    }

    public function getCategoryList(): array
    {
        $articleSql = sprintf('SELECT * FROM categories ');

        $stmt = $this->connection->query($articleSql);

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
    }
}