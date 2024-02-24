<?php

use App\Enums\FilterType;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResultController;
use App\Http\Services\ResultProviderService;
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


Route::get('/login', [AuthController::class, 'loginPage'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'login'])->name('loginUser');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });



    Route::get('/home', [DashboardController::class, 'loadDashboard'])->name('home');

    Route::get('/list/subcity', [ResultController::class, 'subcityList']);
    Route::get('/list/sectors', [ResultController::class, 'sectorList']);


    Route::get('/sector/{sector_id}/city', [ResultController::class, 'getInfoBySectorCity']);
    Route::get('/sector/{sector_id}/subcity', [ResultController::class, 'getInfoBySectorSubcity']);
    Route::get('/sector/{sector_id}/wereda', [ResultController::class, 'getInfoBySectorWereda']);

    Route::get('/sector/details/{sector_id}/{type}',[ResultController::class,'sectorDetail']);
    Route::get('/sector/details/{sector_id}/{type}/{area_id}',[ResultController::class,'getSectorDetail']);
    Route::get('/subcity/{id}', [ResultController::class, 'getSubcity']);

    Route::get('/graphApi/subcity', [ResultController::class, 'getSubcitiesForGraphs']);
    Route::get('/graphApi/sector/{type}',[ResultController::class,'getSectorsForGraphs']);



    Route::get('/test',function(){
            return ResultProviderService::getResultData(type:FilterType::CITY,filters: [
                'sector_id' => 1,
                'question_id' => 4,
            ]);
    });
});
