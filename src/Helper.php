<?php 

namespace src;

class Helper 
{
    // To walk through directories in my root directory project 
    public function base_path(string $path, $data = [])
    {
        extract($data);
        return dirname(__DIR__) . "/{$path}"; 
    }

    // To render 404 || add-product form || home page of product list
    public function view($name, $data = [])
    {
        extract($data);
        return require $this -> base_path("views/{$name}.view.php");
    }

    // To return footer of the page || header of the page || product card
    public function partial($name, $data = [])
    {
        extract($data);
        return require $this -> base_path("views/components/{$name}.php");
    }
}
