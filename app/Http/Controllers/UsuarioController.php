<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function index() {
        return view('usuarios');
    }

    public function cadastrar() {

        return view('cadastrar');
    }

    public function editar($id) {

        $usuario = $this->usuario->getById($id);

  

        if(!isset($usuario))
        {
            return redirect('usuarios');
        }

        return view('editar',compact('usuario',$usuario));
    }
}
