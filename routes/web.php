<?php


use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware('auth','isAdmin')->group( function(){

Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

// Category Route
Route::get('category',[App\Http\Controllers\Admin\CategoryController::class, 'index']);
Route::get('category/create',[App\Http\Controllers\Admin\CategoryController::class, 'create']);
Route::post('category',[App\Http\Controllers\Admin\CategoryController::class, 'store']);
Route::get('category',[App\Http\Controllers\Admin\CategoryController::class,'show']);
Route::get('category/edit/{item}',[App\Http\Controllers\Admin\CategoryController::class,'edit']);
Route::patch('category/{category}',[App\Http\Controllers\Admin\CategoryController::class,'update']);
Route::delete('category/destroy/{item}',[App\Http\Controllers\Admin\CategoryController::class,'destroy']);

// Brands
Route::get('brands',[App\Http\Controllers\Admin\BrandController::class,'index']);
Route::resource('brands', BrandController::class);

// Product
Route::resource('products',ProductController::class);
 //Slider
 Route::resource('sliders',SliderController::class);
});

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('product',[App\Http\Controllers\Frontend\FrontendController::class, 'create']);
Route::get('product/{id}',[App\Http\Controllers\Frontend\FrontendController::class, 'show'])->name('product');
Route::get('add_to_card/{id}',[App\Http\Controllers\Frontend\FrontendController::class, 'Addcard'])->name('add_to_card');
Route::get('show_card',[App\Http\Controllers\Frontend\FrontendController::class, 'Showcard'])->name('show_card');
Route::get('/remove/{id}', [App\Http\Controllers\Frontend\FrontendController::class,'delete'])->name('remove');
Route::get('search', [App\Http\Controllers\Frontend\FrontendController::class,'search'])->name('search');
// Route contact
// Route::get('contacts',[App\Http\Controllers\Frontend\ContactController::class, 'index']);
Route::resource('contacts',ContactController::class);
