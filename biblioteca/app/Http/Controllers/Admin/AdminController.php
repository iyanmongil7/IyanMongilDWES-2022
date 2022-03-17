<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Libro;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function libros(){
        $libros=Libro::all();
        return view('admin.libros.index', compact('libros'));
    }
}
