<?php

namespace App\Http\Controllers;

use App\Models\Subcategorias;
use Illuminate\Http\Request;

class SubcategoriasController extends Controller
{
    //
    public function index()
    {
        return Subcategorias::with('cursos')
            ->get();
    }
    public function obtenerCursos($id)
    {
        return Subcategorias::where('id', $id)
            ->with('cursos')
            ->first();
    }
    public function store(Request $request)
    {
        return Subcategorias::create($request->all());
    }
}
