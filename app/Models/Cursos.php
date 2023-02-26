<?php

namespace App\Models;

use App\Models\Subcategorias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cursos extends Model
{
    use HasFactory;
    protected $fillable=[
        'curso_nombre',
        'curso_imagen',
        'curso_creador',
        'curso_original_link',
        'curso_link',
        'curso_subcategoria_id',
        'curso_estado_id',
        'curso_valoracion'
    ];
    public function subcategorias(){
        return $this->belongsTo(Subcategorias::class,'curso_subcategoria_id','id');
    }
}
