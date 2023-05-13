<?php

use src\Http\Route;
use src\Helper;

// project-root/src
require dirname(__DIR__) . '/src/Helper.php';
$helper = new Helper();

require $helper -> base_path('src/bootstrap.php', [
    'helper' => $helper
] );

require $helper -> base_path('routes/web.php');
Route::resolve();
