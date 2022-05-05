<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SliderController;
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

Route::get('/admin',[AdminController::class,'dashboard']);
Route::get('/commandes',[AdminController::class,'commandes']);

Route::get('/ajoutCategorie',[categoryController::class,'ajoutCategorie']);
Route::get('/showAllCategorie',[categoryController::class,'showAllCategorie']);
Route::post('/saveCategorie',[categoryController::class,'saveCategorie']);
Route::get('/edit_category/{id}',[categoryController::class,'editCategory']);
Route::get('/delete_category/{id}',[categoryController::class,'deleteCategory']);
Route::post('/updateCategory',[categoryController::class,'updateCategory']);

Route::get('/ajoutProduit',[ProduitController::class,'ajoutProduit']);
Route::get('/produitShowAll',[ProduitController::class,'ProduitShowAll']);
Route::post('/saveProduit',[ProduitController::class,'saveProduit']);
Route::get('/edit_produit/{id}',[ProduitController::class,'edit_produit']);

Route::get('/ajoutSlider',[SliderController::class,'ajoutSlider']);
Route::get('/showAllSlider',[SliderController::class,'showAllSlider']);
Route::post('/saveSlider',[SliderController::class,'saveSlider']);