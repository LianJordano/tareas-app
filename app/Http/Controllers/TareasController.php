<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tarea\updateRequest;
use App\Http\Requests\tareas\StoreRequest;
use App\Models\Tareas;
use App\Models\Categorias;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   


    public function index()
    {
        $tareas = Tareas::all();
        $categorias = Categorias::all();
        return view("tareas.index",compact("tareas","categorias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $datos = $request->only("nombre","descripcion","fecha","categoria_id");
        Tareas::create($datos);
        return redirect()->back()->with("success","Tarea creada satisfactoriamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function show(Tareas $tareas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tareas $tarea)
    {
        $categorias = Categorias::all();
        return view("tareas.edit",[
            "tarea"=>$tarea,
            "categorias"=>$categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, Tareas $tarea)
    {
        $datos = $request->only("nombre","descripcion","fecha","estado","categoria_id");
        $tarea->update($datos);
        return redirect()->back()->with("success","Tarea actualizada!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tareas $tarea)
    {
        $tarea->delete();
        return redirect(route("tareas.index"))->with("success","Tarea Eliminada");
    }


 
}
