<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    //
public function index()
{
    return Estado::get();
}
public function store(Request $request)
{
    return Estado::create($request->all());
}
}
