<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Salao extends Model
{
    use HasFactory;

    // Opcional, se o nome da tabela for diferente do padrão plural (usuarios)
    protected $table = 'saloes';

    // Campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];
}
