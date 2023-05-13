<?php

namespace src;

use PDO;
use PDOException;

class DB
{
    public static function connect_to_db($config)
    {
        try
        {
            return new PDO(
                $config['connection'] . ':host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['dbname'],
                $config['uname'],
                $config['password'],
                $config['options']
            );
        }
        catch(PDOException $exp)
        {
            echo "Failed to connect to database: " . $exp->getMessage();
            exit();
        }
    }
}