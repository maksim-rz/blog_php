<?php


class UserModel
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

    public function getUserByEmail(string $email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS,  'User');
        $stmt->execute();
        $user = $stmt->fetch();

        return $user ? : null;
    }

    public function getUserById(int $id)
    {
        $sql = sprintf('SELECT * FROM users WHERE id = %d', $id);

        $stmt = $this->connection->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS,  'User');
        return $stmt->fetch();
    }
}