<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LibroController;


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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/',[\App\Http\Controllers\Admin\AdminController::class,'index']);
    Route::get('users', [UserController::class, 'index']);
    
    Route::resource('/libros', LibroController::class);

});

Route::get('/librosUser', [\App\Http\Controllers\LibroController::class, 'index'])->name('librosUser');





Auth::routes();
