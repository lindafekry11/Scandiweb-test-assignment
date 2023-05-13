<?php

namespace App\Models;

class Furniture extends Product
{
    public function save($request)
    {
        $request['properties'] = 'Dimension: ' . $request['height'] . ' ' .'x' . ' ' . $request['width']  . ' ' .'x' . ' ' . $request['length'];
        unset($request['width'], $request['length'], $request['height']);
        $this->insert($request);
    }

    public function validAttribute($request)
    {
        foreach(['width', 'height', 'length'] as $key)
        {
            if(! $this -> validator -> validNumber($request[$key]))
            {
                $this->errors['type'] = "There's a missing dimension(s)";
            }
        }
	}
}