<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;

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

    public function catalogolibros(){
        $libros = Libro::all();
        return view('admin.users.libros.libroslistas', compact('libros'));
    }

    public function crearPrestamo($idLibro)
    {
        $idUsuario = Auth::user()->id;
        $fecha = '2022-11-16';
        Prestamo::create([
            'usuario'=> $idUsuario,
            'libros'=>$idLibro,
            'fecha'=>$fecha,
        ]);
        return redirect(route("librosUser.index"))
        ->with("success", __("Prestamo creado!"));
    }
    
}
