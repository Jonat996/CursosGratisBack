<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function index()
    {
        return Categoria::with(['subcategorias' => function ($query) {
            $query->select('id', 'subcategoria_nombre', 'principal_id');
        }])
            ->get(['id', 'categoria_nombre']);
    }
    public function store(Request $request)
    {
        return Categoria::create($request->all());
    }
    public function obtenerCursos($id)
    {
        return Categoria::where('id', $id)
            ->with(['subcategorias' => function ($query) {
                $query->with('cursos');
            }])
            ->first();
    }
}
