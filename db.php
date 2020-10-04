<?php

class database
{
    private $_pdo;
    private static $_sharedInstance;

    public static function getSharedInstance(){
        if (isset(database::$_sharedInstance)) {
            return database::$_sharedInstance;
        }
        database::$_sharedInstance = new database;
        return database::$_sharedInstance;
    }

    public function __construct()
    {
        try {
            $this->_pdo = new PDO(
                'mysql:host=192.168.99.100;dbname=dockerTest;port=8080',
                'root',
                ''

            );
        }
        catch(PDOException $e)
        {
            //TODO: replace echo with throw error
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function exec($sql, $data)
    {
        $STH = $this->_pdo->prepare($sql);
        $STH->execute($data);

    }

    public function select($sql,$data)
    {
        $sth = $this->_pdo->prepare($sql);
        $sth ->execute($data);
        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }

}


?>