<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AdminController;



Route::get('/admin',[AdminController::class,'index'])->name('admin.index');