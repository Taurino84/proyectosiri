<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UbicacionControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->input('texto'));
        $ubicaciones = DB::table('ubicaciones')
        ->select('idUbicacion','nombre','direccion','estado')
        ->where('nombre','LIKE','%'.$texto.'%')
        ->orWhere('estado','LIKE','%'.$texto.'%')
        ->orderBy('nombre')
        ->orderBy('estado')
        ->paginate(10);
        return view('ubicacion.index',compact('ubicaciones','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ubicacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ubicaciones = new Ubicacion;
        $ubicaciones->nombre = $request->input('nombre');
        $ubicaciones->direccion = $request->input('direccion');
        $ubicaciones->estado = $request->input('estado');
        $ubicaciones->save();
        return redirect()->route('ubicacion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ubicaciones = Ubicacion::findOrFail($id);
        return  view('ubicacion.edit',compact('ubicaciones'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubicaciones = Ubicacion::findOrFail($id);
        $ubicaciones->nombre = $request->input('nombre');
        $ubicaciones->direccion = $request->input('direccion');
        $ubicaciones->estado = $request->input('estado');
        $ubicaciones->save();
        return redirect()->route('ubicacion.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ubicaciones = Ubicacion::findOrFail($id);
        $ubicaciones->delete();
        return redirect()->route('ubicacion.index');
    }
}
