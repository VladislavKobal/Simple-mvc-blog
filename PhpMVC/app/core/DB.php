<?php

class DB
{
    private static $instance = null;
    private $dbh;


    function __construct()
    {
        $dsn = 'mysql:host=' . MYSQL_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        try {
            $this->dbh = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->dbh;
    }

    public function query($sql, $parameters = [])
    {
        $dbh = $this->getConnection();

        // prepare SQL statement
        $stmt = $dbh->prepare($sql);

        if ($stmt === false) {
            // trigger (big, orange) error
            trigger_error($dbh->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute SQL statement
        $result = $stmt->execute($parameters);

        // return result set's rows, if any
        if ($result !== false) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }

    }


}