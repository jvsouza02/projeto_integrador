<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function redirecionar(){
        $usuario = Auth::user()->tipo_usuario;

        if($usuario == 1){
            return view('admin.admin_inicio');
        } else {
            return view('home');
        }
    }
}
