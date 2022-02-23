<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AdminController;



Route::get('/admin',[AdminController::class,'index'])->name('admin.index');

Route::prefix('admin')->group(function(){
    Route::get("/admin",[AdminController::class, "index"]);
    Route::get("/list_users",[AdminController::class, "list_users"]);
    Route::get("/list_projects",[AdminController::class, "list_projects"]);
});