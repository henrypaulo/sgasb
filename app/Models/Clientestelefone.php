<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientestelefone extends Model
{
    protected $table = 'clientestelefone';
    protected $fillable = ['id_cliente', 'n_telefone'];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}
