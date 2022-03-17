<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Http\Controllers\Controller;

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
        if(auth()->user()->id==1){
            $libros = Libro::paginate(10);
        }else{
        $libros = Libro::where("user_id" , "=", auth()->user()->id)->paginate(10);
    }
        return view("admin/libros.index", compact("libros"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro;
        $title = __("Crear libro");
        $textButton= __("Crear");
        $route = route("libros.store");
       /* dd(compact("title", "textButton", "route", "project"));*/
        return view("admin.libros.create", compact("title", "textButton", "route", "libro"));

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
            "nombre"=>"required|max:140|unique:libros",
            "autor" => "required|string",
            "editorial" => "required|string",
            "año" => "required|string",
        ]);
        Libro::create($request->only("nombre", "autor", "editorial", "año"));

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
    public function edit($id)
    {
        $libro=Libro::find($id);
        $update=true;
        $title= __("editar libro");
        $textButton=__("actualizar");
        $route=route("libros.update", $libro->id);
        return view("admin.libros.edit", compact("update", "title", "textButton","route","libro"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$this->validate($request, [
            "name" => "required|string:libro,nombre," .$libros->id,
            "description" => "nullable|string|min:10"
        ]);*/
        $libros= Libro::find($id);
        $libros->fill($request->only("nombre", "autor", "editorial", "año"))->save();
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
