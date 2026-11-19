<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
        'nome_produto',
        'codigo',
        'estoque',
        'limite_estoque_baixo',
        'categoria',
        'fornecedor',
        'data_validade',
        'descricao',
    ];
}
