<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CoffeeController;
use App\Http\Middleware\AdminMIddleware;
use App\Http\Middleware\AuthMiddleware;
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

Route::get('/',function(){
    return view('welcome');
});


Route::middleware(AuthMiddleware::class)->group(function(){
    Route::get('/create',function(){
        return view('create');
    });
    Route::post('/addData',[CoffeeController::class,'create']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/coffee/{coffee}/carts',[CartController::class,'store']);
    Route::get('/carts/me',[CartController::class,'show']);
    Route::get('/carts/{coffee}/destroy',[CartController::class,'destroy']);
});


Route::middleware('guest')->group(function(){
    Route::get('/register',[AuthController::class,'register']);
    Route::post('/register/store',[AuthController::class,'registerStore']);
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login/store',[AuthController::class,'loginStore']);
});
