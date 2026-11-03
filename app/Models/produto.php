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
        'categoria',
        'fornecedor',
        'data_validade',
        'descricao',
    ];
}