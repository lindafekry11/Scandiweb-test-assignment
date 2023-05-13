<?php

namespace App\Models;

class Book extends Product
{
    public function save($request)
    {
        $request['properties'] = 'Weight: ' . $request['weight'] . ' KG';
        unset($request['weight']); // Remove the weight key from the $request array, to prevent redundancy and to ensure that only relevant data is inserted into the database no need of using the weight
        $this->insert($request);
    }

    public function validAttribute($request) 
    {
        if(! $this -> validator -> validNumber($request['weight']))
        {
            $this -> errors['type'] = "Please enter the weight ";
        }
	}
}