<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\User;

class LibroController extends Controller
{
    public function __contruct()
    {
        $this->middleware("auth");
    }
    //cambiar index
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros=Libro::paginate(10);
        return view("libros", compact("libros"));
    }
    public function listalibros(){
        $users = User::paginate(10);
        return view('admin.users.libros.libroslistas', compact("users"));
    }

    
}
