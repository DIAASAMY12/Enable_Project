<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\VendorController;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::prefix('dsh/admin')->group(function(){
    Route::view('/','dsh.parent');
    Route::view('/index','dsh.temp.index');
    Route::resource('cities', CityController::class);

    Route::resource('categories',CategoryController::class);
    Route::resource('vendors',VendorController::class);
});