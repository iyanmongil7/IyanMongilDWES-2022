<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function __contruct()
    {
        $this->middleware("auth");
    }
    //prueba
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where("user_id" , "=", auth()->user()->id)->paginate(10);
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project;
        $title = __("Crear proyecto");
        $textButton= __("Crear");
        $route = route("projects.store");
       /* dd(compact("title", "textButton", "route", "project"));*/
        return view("projects.create", compact("title", "textButton", "route", "project"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"=>"required|max:140|unique:projects",
            "description" => "nullable|string|min:10",
        ]);
        Project::create($request->only("name", "description"));

        return redirect(route("projects.index"))
            ->with("success", __("¡Proyecto creado!"));
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
    public function edit(Project $project)
    {
        $update=true;
        $title= __("editar proyecto");
        $textButton=__("actualizar");
        $route=route("projects.update", ["project" => $project]);
        return view("projects.edit", compact("update", "title", "textButton","route","project"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            "name" => "required|unique:projects,name," .$project->id,
            "description" => "nullable|string|min:10"
        ]);
        $project->fill($request->only("name", "description"))->save();
        return back()->with("success",__("¡Proyecto actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with("success", __("¡Proyecto eliminado!"));
    }
}
