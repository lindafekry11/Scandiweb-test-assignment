<?php

use App\Controllers\ProductsController;
use src\Http\Route;

Route::get('/', [ProductsController::class, 'index']); // Retrieve all products data
Route::post('/', [ProductsController::class, 'delete']); // Handle requests to delete a product from the database

Route::get('/add-product', [ProductsController::class, 'add']); // Retrieve the form to add new product
Route::post('/add-product', [ProductsController::class, 'store']); // Handle form submissions for adding a new product to the database