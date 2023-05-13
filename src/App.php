<?php

namespace src;

class App
{
    protected static array $key_value = [];
    
    // adding key-value pairs to the array 
    public static function bind($key, $value)
    {
        self::$key_value[$key] = $value;
    }

    public static function resolve($key)
    {
        if(! array_key_exists($key, self::$key_value))
        {
            echo "The key: {$key} not found!!";
            exit();
        }

        // Access the values of the array using the keys
        return self::$key_value[$key];
    }
}