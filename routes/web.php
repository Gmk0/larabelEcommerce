<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\pdfController;
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
Route::get('/sele_cat/{id}',[ClientController::class,'sele_cat']);
Route::get('/add_cart/{id}',[ClientController::class,'add_cart']);
Route::post('/update_qty/{id}',[ClientController::class,'update_qty']);
Route::get('/remove_item/{id}',[ClientController::class,'remove_item']);
Route::post('/payement',[ClientController::class,'payement']);
Route::post('/createCompte',[ClientController::class,'createCompte']);
Route::post('/accederCompte',[ClientController::class,'accederCompte']);
Route::get('/logout',[ClientController::class,'logout']);

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
Route::post('/updateProduit',[ProduitController::class,'updateProduit']);
Route::get('/edit_produit/{id}',[ProduitController::class,'edit_produit']);
Route::get('/delete_produit/{id}',[ProduitController::class,'delete_produit']);
Route::get('/activer_produit/{id}',[ProduitController::class,'activer_produit']);
Route::get('/desactiver_produit/{id}',[ProduitController::class,'desactiver_produit']);

Route::get('/ajoutSlider',[SliderController::class,'ajoutSlider']);
Route::get('/showAllSlider',[SliderController::class,'showAllSlider']);
Route::post('/saveSlider',[SliderController::class,'saveSlider']);
Route::post('/updateSlider',[SliderController::class,'updateSlider']);
Route::get('/edit_slider/{id}',[SliderController::class,'edit_slider']);
Route::get('/delete_slider/{id}',[SliderController::class,'delete_slider']);
Route::get('/activer_slider/{id}',[SliderController::class,'activer_slider']);
Route::get('/desactiver_slider/{id}',[SliderController::class,'desactiver_slider']);

Route::get('/voir_pdf/{id}',[pdfController::class,'voir_pdf']);

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
