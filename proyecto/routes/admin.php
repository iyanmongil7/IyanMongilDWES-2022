<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\HomeController;


Route::get('admin',[HomeController::class,'index'])->name('admin.index');