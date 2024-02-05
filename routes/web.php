<?php

use App\Http\Controllers\AuthController;
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


Route::get('/login',[AuthController::class,'loginPage'])->name('login');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::post('/login',[AuthController::class,'login'])->name('login');


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/',function(){
        return view('welcome');
    });
});



