<?php

namespace App\Validators;

class ProductsValidator
{
    public function validStringAndNumber($input)
    {
        return preg_match('/^[a-zA-Z0-9]+$/', $input) && strlen($input) > 0;
    }

    public function validString($input)
    {
        return preg_match('/^[a-zA-Z\s]+$/', $input) && strlen($input) > 0;
    }

    public function validNumber($input) 
    {
        return is_numeric($input) && $input > 0;
    }

    public function validType($type)
    {
        return $type == 'Dvd' or 'Furniture' or 'Book';
    }

    /* Removing any unwanted characters from the input data, such as HTML tags or special characters,
    to ensure that the input data is cleaned and safe to use in the web-app */
    public function sanitize($input)
    {
        $input = htmlspecialchars(stripslashes(trim($input))); // Removing whitespace and backslashes and converting special characters to HTML entities
        return $input;
    }
}