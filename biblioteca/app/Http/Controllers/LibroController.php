<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libros = new Libro;
        $title = __("Crear libro");
        $textButton= __("Crear");
        $route = route("libros.store");
       /* dd(compact("title", "textButton", "route", "project"));*/
        return view("libros.create", compact("title", "textButton", "route", "libros"));

    }
    
    /*dolomiti*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"=>"required|max:140|unique:libros",
            "description" => "nullable|string|min:10",
        ]);
        Libro::create($request->only("nombre", "description"));

        return redirect(route("libros.index"))
            ->with("success", __("Libro creado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libros)
    {
        $update=true;
        $title= __("editar libro");
        $textButton=__("actualizar");
        $route=route("libros.update", ["libros" => $libros]);
        return view("libros.edit", compact("update", "title", "textButton","route","libros"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libros)
    {
        $this->validate($request, [
            "name" => "required|string:libro,nombre," .$libros->id,
            "description" => "nullable|string|min:10"
        ]);
        $libros->fill($request->only("name", "description"))->save();
        return back()->with("success",__("Libro actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libros = Libro::find($id);
        $libros->delete();
        return back()->with("success", __("Libro eliminado!"));
    }
}
