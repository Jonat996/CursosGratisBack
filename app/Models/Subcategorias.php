<?php

namespace App\Models;

use App\Models\Cursos;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategorias extends Model
{
    use HasFactory;
    protected $fillable=[
        'subcategoria_nombre',
        'principal_id'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'principal_id','id');
    }
    public function cursos()
    {
        return $this->hasMany(Cursos::class,'curso_subcategoria_id');
    }
}
