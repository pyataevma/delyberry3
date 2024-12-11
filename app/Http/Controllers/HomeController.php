<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('home', compact('productos'));
    }
}
