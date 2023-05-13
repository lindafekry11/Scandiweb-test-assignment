<?php

namespace App\Models;

class Dvd extends Product
{
    public function save($request)
    {
        $request['properties'] = 'Size: ' . $request['size'] . ' MB';
        unset($request['size']); // Remove the size key from the $request array, to prevent redundancy and to ensure that only relevant data is inserted into the database no need of using the size
        $this->insert($request);
    }

    public function validAttribute($request)
    {
        if(! $this -> validator -> validNumber($request['size']))
        {
            $this->errors['type'] = "Please enter the DVD's capacity";
        }
	}
}