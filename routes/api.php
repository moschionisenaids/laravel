<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroProdutoController;
use App\Models\Produto;

// ===================================
// USUARIO
// ===================================

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ===================================
// LOGIN
// ===================================

Route::post('/login', [LoginController::class, 'login_api']);

// ===================================
// CADASTROS
// ===================================

Route::post('/cadastro_usuario', [UsuarioController::class, 'cadastro_usuario']);

Route::post('/cadastro_produto', [CadastroProdutoController::class, 'cadastro_produto']);

// ===================================
// STATUS DO ESTOQUE PARA O ESP32
// ===================================

Route::get('/estoque/status-iot', function () {

    $produtos = Produto::all();

    // Conta os produtos em falta
    $produtosEmFalta = $produtos->where('estoque', '<=', 0)->count();

    // Conta os produtos em alerta
    $produtosEmAlerta = $produtos->filter(function ($produto) {
        return $produto->estoque > 0 &&
               $produto->estoque <= $produto->limite_estoque_baixo;
    })->count();

    // Define a cor do LED
    if ($produtosEmFalta > 0 || $produtos->isEmpty()) {

        $status = 'vermelho';

    } elseif ($produtosEmAlerta > 0) {

        $status = 'amarelo';

    } else {

        $status = 'verde';

    }

    return response()->json([

        'status' => $status,

        'total_produtos' => $produtos->count(),

        'produtos_em_alerta' => $produtosEmAlerta,

        'produtos_em_falta' => $produtosEmFalta

    ]);

});
