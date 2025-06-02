<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Clientestelefone;

class Cliente extends Authenticatable
{
    use HasFactory;

    protected $table = 'clientes';
    protected $fillable = ['nome', 'email', 'senha'];

    public function telefones() {
        return $this->hasMany(Clientestelefone::class,'id_cliente');
    }
    public function getAuthPassword()
    {
        return $this-> senha;
    }
    
}
