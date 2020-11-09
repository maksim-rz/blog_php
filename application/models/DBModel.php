<?php


class DBModel
{
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    private static $instance;

    private $dbh;

    private function __construct(string $dbname,  string $servername, string $username, string $password, string $driver = 'mysql', string $charset = 'utf8')
    {
        $dsn = sprintf('%s:dbname=%s;host=%s;charset=%s', $driver, $dbname, $servername, $charset);

        try {
            $this->dbh = new PDO($dsn, $username, $password, $this->options);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }

    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$instance && self::$instance instanceof self) {
            return self::$instance;
        }

        $configs = new ConfigModel(MAIN_CONFIG);
        $dbSettings = $configs->getSettings('database');

        self::$instance = new self(
            $dbSettings['dbname'],
            $dbSettings['servername'],
            $dbSettings['username'],
            $dbSettings['password'],
            $dbSettings['driver'],
            $dbSettings['charset']
        );

        return self::$instance;
    }


    public function getConnection(): PDO
    {
        return $this->dbh;
    }
}