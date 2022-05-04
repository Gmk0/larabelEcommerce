<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[ClientController::class,'home']);

Route::get('/shop',[ClientController::class,'shop']);
Route::get('/client_login',[ClientController::class,'client_login']);
Route::get('/cart',[ClientController::class,'cart']);
Route::get('/signup',[ClientController::class,'signup']);
Route::get('/checkout',[ClientController::class,'checkout']);
