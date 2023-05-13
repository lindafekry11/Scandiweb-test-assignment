<?php

use src\App;
use src\DB;
use src\QueryBuilder;

require $helper -> base_path('/vendor/autoload.php');


App::bind('config', require $helper -> base_path('config/config.php'));

App::bind('database', 
    DB::connect_to_db(App::resolve('config')['database'])
); 

QueryBuilder::$pdo = App::resolve('database') ;