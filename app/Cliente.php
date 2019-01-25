<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //Especificacao para fazer o relacionamento entre as tabelas
    public function getendereco() {
        //Controlle para o relacionamento, 
        //o primeiro parametro é o campo da tabela endereco
        //e o segundo é o da tabela cliente
        return $this->hasOne('App\Endereco');
    }
}
