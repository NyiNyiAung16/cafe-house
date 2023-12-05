<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriberController;
use App\Http\Middleware\AdminMIddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Models\Coffee;
use App\Models\Review;
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

Route::get('/',function(){return view('welcome');});
Route::get('/about',
    function(){ return view('about',[
        'posts' => Review::latest()->get()
    ]);
});
Route::get('/contact',function(){ return view('contact'); });


Route::middleware(AuthMiddleware::class)->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/coffee/{coffee}/carts',[CartController::class,'store']);
    Route::get('/carts/me',[CartController::class,'show']);
    Route::get('/carts/{coffee}/destroy',[CartController::class,'destroy']);
    Route::patch('/changeProfileImg',[ProfileController::class,'changeImg']);
    Route::patch('/changeProfile',[ProfileController::class,'changeProfile']);
    Route::post('/subscribe',[SubscriberController::class,'store']);
    Route::middleware(AdminMIddleware::class)->group(function(){
        Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
        Route::get('/admin/create',[AdminController::class,'create']);
        Route::get('/admin/promotion/create',[AdminController::class,'createPromotion']);
        Route::post('/admin/promotion/store',[AdminController::class,'promotionStore']);
        Route::get('/admin/sortByName',[AdminController::class,'sortByName']);
        Route::get('/admin/sortByDate',[AdminController::class,'sortByDate']);
        Route::post('/admin/store',[AdminController::class,'store']);
    });
    Route::get('/api/promotions',[PromotionController::class,'get']);
    Route::post('/review/store',[ReviewController::class,'store']);
    Route::delete('/review/destroy/{review}',[ReviewController::class,'destroy']);
});


Route::middleware('guest')->group(function(){
    Route::get('/register',[AuthController::class,'register']);
    Route::post('/register/store',[AuthController::class,'registerStore']);
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login/store',[AuthController::class,'loginStore']);
});
