<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->input('texto'));
        $usuarios = DB::table('usuarios')
        ->select('idUsuario','alias','email','password')
        ->where('alias','LIKE','%'.$texto.'%')
        ->orWhere('email','LIKE','%'.$texto.'%')
        ->orderBy('alias')
        ->paginate(10);
        return view('usuario.index',compact('usuarios','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuarios = new Usuario;
        $usuarios->alias = $request->input('alias');
        $usuarios->email = $request->input('email');
        $usuarios->password = $request->input('password');
        $usuarios->save();
        return redirect()->route('usuario.index');
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
        $usuarios = Usuario::findOrFail($id);
        return  view('usuario.edit',compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuarios = Usuario::findOrFail($id);
        $usuarios->alias = $request->input('alias');
        $usuarios->email = $request->input('email');
        $usuarios->password = $request->input('passwrod');
        $usuarios->save();
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuarios = Usuario::findOrFail($id);
        $usuarios->delete();
        return redirect()->route('usuario.index');
    }
}
