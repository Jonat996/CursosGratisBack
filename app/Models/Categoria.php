<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable=[
        'categoria_nombre'
    ];
    public function subcategorias()
    {
        return $this->hasMany(Subcategorias::class,'principal_id');
    }
}
