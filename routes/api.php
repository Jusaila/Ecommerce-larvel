<?php

use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/categories',[HomepageController::class, 'categories']);

//all user details
Route::get('/allusers',[ApiController::class, 'allUsers']);

//user details of a particular user based on user id
Route::get('/user-details/{id}', [ApiController::class,'userdetails']);

//all product list
Route::get('/products',[ApiController::class, 'products']);

//cart total amount
Route::get('/cart-total/{userId}', [ApiController::class, 'carttotal']);

//list product for certain category
Route::get('/category-product/{id}', [ApiController::class, 'categoryProduct']);

//list product details of particular product
Route::get('/product-details/{id}', [ApiController::class, 'productDetails']);

//register
Route::post('/register',[ApiController::class, 'register']);
