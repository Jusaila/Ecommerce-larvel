<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExcellentController;
use App\Http\Controllers\Admin\ExcellentProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomebannerController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthLoginRegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentTypeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WebsiteContentController;
use App\Http\Controllers\WhyChooseUsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/register',[AuthController::class, 'do_register'])->name('do_register');

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'do_login'])->name('do_login');



Route::middleware('auth')->group(function(){
    Route::get('/', [HomepageController::class, 'home'])->name('home');
    Route::get('/cart',[CartController::class, 'cart'])->name('cart');
    Route::post('/cart/create/{product}',[CartController::class, 'create'])->name('cart.create');
    Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
    Route::post('/cart/delete',[CartController::class, 'cartDelete'])->name('cart.delete');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


});
// Route::get('/', [HomepageController::class, 'home'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/shop',[ProductController::class, 'shop'])->name('shop');
Route::get('/product-details/{id}',[CategoryController::class, 'productDetails'])->name('product.details');
Route::get('/about',[AboutUsController::class, 'about'])->name('about');
Route::get('/blog',[BlogController::class, 'blog'])->name('blog');
Route::get('/contact',[ContactController::class, 'contact'])->name('contact');



//category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/add-categories', [CategoryController::class, 'create'])->name('add-categories');
Route::post('/category-save', [CategoryController::class, 'save'])->name('category.save');
//actions
Route::post('/delete-categories',[CategoryController::class, 'delete'])->name('category.delete');
Route::get('/edit-categories/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('/update-category',[CategoryController::class, 'update'])->name('category.update');
//product
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/add-products', [ProductController::class, 'create'])->name('add-products');
Route::post('/product-save', [ProductController::class, 'save'])->name('product.save');
//actions
Route::post('/delete-products', [ProductController::class , 'delete'])->name('product.delete');
Route::get('/edit-products/{id}', [ProductController::class , 'edit'])->name('product.edit');
Route::post('/update-products', [ProductController::class , 'update'])->name('product.update');


Route::prefix('banner')->group(function(){
    //banner
    Route::get('/',[HomebannerController::class,'index'])->name('home-banner');
    Route::get('/create',[HomebannerController::class,'create'])->name('banner.create');
    Route::post('/save',[HomebannerController::class,'save'])->name('banner.save');
    //actions
    Route::post('/delete',[HomebannerController::class, 'delete'])->name('banner-delete');
    Route::get('/edit/{id}',[HomebannerController::class, 'edit'])->name('banner-edit');
    Route::post('/update', [HomebannerController::class , 'update'])->name('banner-update');


});
//excellent-product
Route::prefix('excellent-product')->group(function(){
    Route::get('/',[ExcellentProductController::class,'index'])->name('excellent-product');
    Route::get('/create',[ExcellentProductController::class,'create'])->name('excellent-product.create');
    Route::post('/save',[ExcellentProductController::class,'save'])->name('excellent-product.save');
    //operation
    Route::post('/delete',[ExcellentProductController::class, 'delete'])->name('excellent-product.delete');
    Route::get('/edit/{id}',[ExcellentProductController::class, 'edit'])->name('excellent-product.edit');
    Route::post('/update',[ExcellentProductController::class, 'update'])->name('excellent-product.update');

});
// excellent
Route::prefix('excellent')->group(function(){
    Route::get('/',[ExcellentController::class,'index'])->name('excellent');
    Route::get('/create',[ExcellentController::class,'create'])->name('excellent.create');
    Route::post('/save',[ExcellentController::class,'save'])->name('excellent.save');
    //operation
    Route::post('/delete',[ExcellentController::class,'delete'])->name('excellent.delete');

});
//testimonials
Route::prefix('testimonials')->group(function(){
    Route::get('/',[TestimonialController::class, 'index'])->name('testimonials');
    Route::get('/create',[TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/save',[TestimonialController::class, 'save'])->name('testimonials.save');
    //actions
    Route::post('/delete',[TestimonialController::class, 'delete'])->name('testimonials.delete');
    // Route::get('/edit/{id}',[TestimonialController::class, 'edit'])->name('testimonials.edit');
    // Route::post('/update',[TestimonialController::class, 'update'])->name('testimonials.update');

});
//why choose us
Route::prefix('chooseus')->group(function(){
    Route::get('/',[WhyChooseUsController::class, 'index'])->name('chooseus');
    Route::get('/create',[WhyChooseUsController::class, 'create'])->name('chooseus.create');
    Route::post('/save',[WhyChooseUsController::class, 'save'])->name('chooseus.save');
    //action
    Route::post('/delete',[WhyChooseUsController::class, 'delete'])->name('chooseus.delete');
});
//content-type
Route::prefix('content')->group(function(){
    Route::get('/',[ContentTypeController::class, 'index'])->name('content');
    Route::get('/create',[ContentTypeController::class, 'create'])->name('content.create');
    Route::post('/save',[ContentTypeController::class, 'save'])->name('content.save');

});
//website-contents
Route::prefix('website')->group(function(){
    Route::get('/',[WebsiteContentController::class, 'index'])->name('website');
    Route::get('/create',[WebsiteContentController::class, 'create'])->name('website.create');
    Route::post('/save',[WebsiteContentController::class, 'save'])->name('website.save');

});

