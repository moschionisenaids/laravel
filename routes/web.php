<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\principalcontroller;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\CadastroProdutoController;
use App\Http\Middleware\LogadoMiddleware;
use App\Http\Controllers\ComunicacaoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'login_html']);
Route::get('/luzes', [ComunicacaoController::class, 'luzes_html']);
Route::get('/nfc', [ComunicacaoController::class, 'nfc_html']);
Route::get('/cadastro_usuario', [UsuarioController::class, 'cadastro_usuario_html']);
Route::get('/bem-vindo', [principalcontroller::class, 'bem_vindo_html'])->middleware(LogadoMiddleware::class);
Route::get('/estoque', [EstoqueController::class, 'estoque_produtos_html'])->middleware(LogadoMiddleware::class);
Route::post('/produto/{id}/atualizar', [EstoqueController::class, 'atualizarProduto'])->middleware(LogadoMiddleware::class);
Route::delete('/produto/{id}/excluir', [EstoqueController::class, 'excluirProduto'])->middleware(LogadoMiddleware::class);
Route::get('/cadastro_produto', [CadastroProdutoController::class, 'cadastro_produto_html']);
