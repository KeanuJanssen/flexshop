<?php



class Database
{
    /* Connect to a MySQL database using driver invocation */
    public function __construct()
    {
        try
        {
            define('DB_NAME', 'db_flexshop');
            define('DB_USER', 'root');
            define('DB_PASSWORD', '');

            $db = new PDO(DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) 
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}