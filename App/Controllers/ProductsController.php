<?php

namespace App\Controllers;

use App\Models\Product;
use src\Helper;

class ProductsController
{
    public function __construct(
        protected $helper = new Helper()
    )
    {}
    

    // Return all products data
    public function index()
    {
        // Creating new instance of the Product class to interact with it, and access the getAllProducts method in it 
        $products = (new Product()) -> getAllProducts();
        return $this -> helper -> view('index',
            [
            'products' => $products,
            'helper' => $this -> helper
            ]
        );        
    }  


    // Parameter is an empty array by default. If no data is passed in, an empty array will be used
    public function add($data = [])
    {
        // Adding a new key-value pair to the $data, provides helpful methods for working with product data or rendering views
        $data['helper'] = $this -> helper;
        return $this -> helper -> view('/add-product', $data); 
    }


    public function store()
    {
        // Creating new product based on the data provided in the $_POST array 
        $inputData = Product::add($_POST);

        // If $inputData array contains 'errors' key !!
        if(isset($inputData['errors']))
        {
            // Again dispalying the form with validation error messages
            return $this -> add($inputData);
        }
        return header("Location: /");
    } 
    
    
    public function delete()
    {
        // Creating new instance of the Product class to interact with it, and access the massDelete method in it 
        $products = (new Product()) -> massDelete($_POST);
        return header("Location: /");
    }
}