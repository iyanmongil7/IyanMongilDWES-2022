<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LibroController;
use App\Http\Controllers\ContactaController;
use App\Mail\ContactaMail;
use Illuminate\Support\Facades\Mail;

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

Route::group(['middleware'=>['can:admin.list_users']], function(){
    Route::get('/admin',[\App\Http\Controllers\Admin\AdminController::class,'index']);
    Route::get('admin/users', [UserController::class, 'index']);
    
    Route::resource('admin/libros', LibroController::class);

});

Route::get('/librosUser', [\App\Http\Controllers\LibroController::class, 'index'])->name('librosUser');
Route::get('/libroslistas', [\App\Http\Controllers\LibroController::class, 'listalibros'])->name('libroslistas');
Route::get('/catalogolibros', [\App\Http\Controllers\LibroController::class, 'catalogolibros']);

Route::get('contacta',[ContactaController::class,'index'])->name('contacta.index');
Route::post('contacta',[ContactaController::class,'store'])->name('contacta.store');

/*Route::get('contacta', function (){
    $correo=new ContactaMail;
    Mail::to('iyanmg49@educastur.es')->send($correo);
    return("mensaje enviado");
});*/


Auth::routes();
