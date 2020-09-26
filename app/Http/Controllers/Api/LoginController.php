<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    private $usuario; 

    public function __construct() {
        $this->usuario = new Usuario(); 
    }

    public function verificarUsuario(LoginFormRequest $request) {

        $data = $request->all();
        
        $login = $data['LOGIN'];
        $senha = $data['SENHA'];
    
      
        $usuario = $this->usuario->verificarUsuario($login,$senha);
   

        if($usuario > 0){
            return response()->json(['success' =>'Usuario encontrado!', 'status' => '201']);
        }        
        return response()->json(['error' =>'Usuario não encontrado!', 'status' =>'404']);
    }
}
