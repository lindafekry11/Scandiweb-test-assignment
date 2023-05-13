<?php

namespace src;

use PDO;
use PDOException;

class QueryBuilder
{
    public static PDO $pdo ;

    public function __construct(
        protected $table = '',
        protected $statement = '',
        protected $sql = ''
    ){}
    

    public function getAllProducts()
    {
        $this->sql = "SELECT * FROM {$this->table}";
        $this->statement = static::$pdo->prepare($this->sql);
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert($request)
    {
        try 
        {
            // Construct a SQL query string that inserts the data into the table 
            $this->sql = sprintf(
                "INSERT INTO %s (%s) VALUES (:%s)",
                $this->table, // %s represents the tableName which is $this->table
                implode(', ', array_keys($request)), // Construct a comma-separated list of column names to be inserted into the products table
                implode(', :', array_keys($request)) // Construct a comma-separated list of named parameter
            );

            // Prepare the SQL statement for execution
            $this->statement = static::$pdo->prepare($this->sql);

            // Execute the SQL statement
            $this->statement->execute($request);
        }
        catch(PDOException $exp)
        {
            echo "Failed to connect to database: " . $exp->getMessage();
            exit();
        }
    }


    public function delete($id)
    {
        $this->sql = "DELETE FROM {$this->table} WHERE id = :id";
        $this->statement = static::$pdo->prepare($this->sql);
        $this->statement->execute(['id' => $id]);
    }   

    
    // Finding a single product record in a database based on its SKU
    public function findUniqueSKU($sku)
    {
        $this->sql = "SELECT * FROM {$this->table} WHERE sku = :sku";
        $this->statement = static::$pdo->prepare($this->sql);
        $this->statement->execute(['sku' => $sku]);
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
}