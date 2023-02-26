<?php

namespace App\Http\Controllers;

use File;
use App\Models\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursosController extends Controller
{
    //
    public function index()
    {
        return Cursos::with('subcategorias')
        ->orderBy('id','desc')
        ->get();
    }

    public function obtenerCategoria($categoria)
    {
        return Cursos::with('subcategorias')
            ->whereHas('subcategorias',  function ($query)
            use ($categoria) {
                $query->where('principal_id', $categoria);
            })
            ->get();
    }
    public function buscarCurso($busqueda)
    {
        return Cursos::where('curso_nombre', 'like', "%{$busqueda}%")
            ->select('id', 'curso_nombre')
            ->get();
    }
    public function buscarPorNombre($busqueda)
    {
        return Cursos::where('curso_nombre', 'like', "%{$busqueda}%")
            ->get();
    }

public function obtenercurso($id)
{
    return Cursos::where('id',$id)
    ->with('subcategorias')
    ->first();
}

    public function obtenerSubcategoria($subcategoria)
    {
        return Cursos::where('curso_subcategoria_id', $subcategoria)->get();
    }
    public function store(Request $request)
    {

        if (!$request->hasFile('curso_imagen')) {
            return [
                "resp" => "error",
                "msj" => "No hay imagen!",
                "error" => "No hay imagen cargada..."
            ];
        }

        $file = $request->file('curso_imagen');
        $archivoNombre = time() . '_' . $file->getClientOriginalName();
        $destino = 'images/curso-images/';


        try {
            $curso = Cursos::create([

                'curso_nombre' => $request->curso_nombre,
                'curso_imagen' => $destino . $archivoNombre,
                'curso_creador' => $request->curso_creador,
                'curso_original_link' => $request->curso_original_link,
                'curso_link' => $request->curso_link,
                'curso_subcategoria_id' => $request->curso_subcategoria_id,
                'curso_estado_id' => 1
            ]);
            $upload = $file->move($destino, $archivoNombre);
        } catch (\Throwable $th) {
            return [
                "resp" => "error",
                "msj" => "Ha ocurrido un error!",
                "error" => $th
            ];
        }
        return [
            "resp" => "success",
            "msj" => "Curso añadido con exito!",
            "curso" => $curso
        ];
    }
    public function curso($id)
    {
        return Cursos::find($id);
    }
}
