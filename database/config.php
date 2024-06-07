<?php

class DatabaseVariables
{
    static $host = "localhost";
    static $username = "root";
    static $password = "";
    static $db_name = "employeedb";
    static $helper;
    static $statement;
}

class Database
{
    public function connect()
    {
        $connectionString = "mysql:host=" . DatabaseVariables::$host . ";dbname=" . DatabaseVariables::$db_name;
        DatabaseVariables::$helper = new PDO($connectionString, DatabaseVariables::$username, DatabaseVariables::$password);
        DatabaseVariables::$helper->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return DatabaseVariables::$helper;
    }

    public function php_prepare($sql)
    {
        return DatabaseVariables::$statement = $this->connect()->prepare($sql);
    }

    public function php_dynamic_handler($params, $values, $types = null)
    {
        if (is_null($types)) {
            switch ($types) {
                case 1:
                    $types = PDO::PARAM_BOOL;
                    break;
                case 2:
                    $types = PDO::PARAM_INT;
                    break;
                default:
                    $types = PDO::PARAM_STR;
            }
        }
        return DatabaseVariables::$statement->bindParam($params, $values, $types);
    }

    public function php_execute()
    {
        return DatabaseVariables::$statement->execute();
    }

    public function php_fetchAll()
    {
        return DatabaseVariables::$statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function php_rowCheck()
    {
        return DatabaseVariables::$statement->rowCount() > 0;
    }

    public function php_fetch()
    {
        return DatabaseVariables::$statement->fetch(PDO::FETCH_ASSOC);
    }
}
