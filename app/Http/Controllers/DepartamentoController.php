<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\Depends;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $departamentos = DB::table('departamentos')
        ->select('idDepartamento','nombre','descripcion','estado')
        ->where('nombre','LIKE','%'.$texto.'%')
        ->orWhere('estado','LIKE','%'.$texto.'%')
        ->orderBy('nombre')
        ->paginate(10);
        return view('departamento.index',compact('departamentos','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departamentos =  new Departamento;
        $departamentos->nombre = $request->input('nombre');
        $departamentos->descripcion = $request->input('descripcion');
        $departamentos->estado = $request->input('estado');
        $departamentos->save();
        return redirect()->route('departamento.index');
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
        $departamentos = Departamento::findOrFail($id);
        return view('departamento.edit',compact('departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departamentos = Departamento::findOrFail($id);
        $departamentos->nombre = $request->input('nombre');
        $departamentos->descripcion = $request->input('descripcion');
        $departamentos->estado = $request->input('estado');
        $departamentos->save();
        return redirect()->route('departamento.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departamentos = Departamento::findOrFail($id);
        $departamentos->delete();
        return redirect()->route('departamento.index');
    }
}
