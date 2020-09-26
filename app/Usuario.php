<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    
    public $table = 'usuarios';

    protected $fillable = [
        'NOME_COMPLETO','LOGIN', 'SENHA', 'ATIVO'
    ];

    public function verificarUsuario($login, $senha) {

        $usuario = $this->where('LOGIN', $login)
        ->where('SENHA', $senha)
        ->get();

        return $usuario->count();
    }

    public function getResults() {
        return $this->get();

    }

    public function getById($id) {
       
       return $this->where('USUARIO_ID', $id)->get()->first();
    }
}
