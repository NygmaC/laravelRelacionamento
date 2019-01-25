<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public function cliente() {
        //Mostra que endereco pertence a CLIENTE
        return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
    }
}
