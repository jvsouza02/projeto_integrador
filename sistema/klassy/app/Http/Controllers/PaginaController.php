<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prato;
use Auth;

class PaginaController extends Controller
{
    public function index(){
        $data = Prato::all();
        return view('klassy.principal', compact('data'));
    }

    public function redirecionar(){
        $usuario = Auth::user()->tipo_usuario;
        if($usuario == 1){
            return view('admin.admin_principal');
        } else {
            $data = Prato::all();
            return view('klassy.principal', compact('data'));
        }
    }
}
