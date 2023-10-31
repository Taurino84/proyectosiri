<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $cargos = DB::table('cargos')
        ->select('idCargo','nombre','descripcion')
        ->where('nombre','LIKE','%'.$texto.'%')
        ->orderBy('nombre')
        ->paginate(10);
        return view('cargo.index',compact('cargos','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cargos = new Cargo;
        $cargos->nombre = $request->input('nombre');
        $cargos->descripcion = $request->input('descripcion');
        $cargos->save();
        return redirect()->route('cargo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cargos = Cargo::findOrFail($id);
        return view('cargo.edit',compact('cargos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cargos = Cargo::findOrFail($id);
        $cargos->nombre=$request->input('nombre');
        $cargos->descripcion = $request->input('descripcion');
        $cargos->save();
        return redirect()->route('cargo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cargos = Cargo::findOrFail($id);
        $cargos->delete();
        return redirect()->route('cargo.index');
        
    }
}
