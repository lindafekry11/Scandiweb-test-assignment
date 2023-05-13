<?php

namespace App\Models;

use App\Validators\ProductsValidator;
use src\QueryBuilder;

class Product extends QueryBuilder
{
    public function __construct(
        protected $validator = new ProductsValidator(),
        protected $table = 'products',
        protected $errors =[]
        ){}

    //The save() and validAttribute() functions are based on the type of model that makes a request
    public function save($request){}
    public function validAttribute($request){}


    public static function add($request)
    {
        // Type of model class Book || Dvd || Furniture ?
        $model = static::targetModel($request['type'] ?? 'Product');

        // Check inputs validation
        $request = $model->validInputs($request);

        // If there is any invalid data inputs, return the data with the errors
        if($model-> getErrors())
        {
            return [
                'data' => $request,
                'errors' => $model->getErrors()
            ];
        }

        // No errors, means that data is saved successfully
        $model->save($request);
    }


    // Which model class selected? Book || Dvd || Furniture ?
    protected static function targetModel($modelName)
    {
        // Go to the path of Models directory and choose the proper one, then return new instance of it
        $modelName = 'App\\Models\\' . $modelName;
        return new $modelName();
    }

    // Return the array of errors 
    public function getErrors()
    {
        return $this->errors;
    }

    // Delete from database by id using the delete() function in my QueryBuilder database queries
    public function massDelete($request)
    {
        foreach($request as $id)
        {
            $this->delete($id);
        }
    }


    protected function validInputs($request)
    {
        /* &$input is a reference to the current element in the array, not a copy of the element 
        this to make the sanitize method modify the original element in the array */
        foreach($request as &$input)
        {
            $input = $this->validator->sanitize($input);
        }

        if(! $this->validator->validStringAndNumber( $request['sku']))
        {
            $this->errors['sku'] = "Please enter a valid sku ";
        }

        if( $this->findUniqueSKU($request['sku']))
        {
            $this->errors['sku'] = "This one's already used, Please enter another one ";
        }
        
        if (! $this->validator->validString( $request['name']))
        {
            $this->errors['name'] = "Please enter a valid name ";
        }
        
        if(! $this->validator->validNumber( $request['price']))
        {
            $this->errors['price'] = "Please enter a valid price ";
        }
        
        // Checking if type is not set and NULL
        if(! isset($request['type']))
        {
            $this->errors['type'] = "Please specify a product type";
            return $request;
        }

        $this->validAttribute($request);
        return $request;

    }
}