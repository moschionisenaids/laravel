<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produto;

class CadastroProdutoController extends Controller
{
    public function cadastro_produto_html(Request $request)
    {
        return view('cadastro_produto');
    }

    public function cadastro_produto(Request $request)
    {
        $request->validate([
            'nome_produto' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
            'estoque' => 'required|integer|min:0',
            'categoria' => 'required|string|max:255',
            'fornecedor' => 'required|string|max:255',
            'data_validade' => 'required|date',
            'descricao' => 'required|string',
        ]);

        $produto = new Produto();

        if ($produto->where('codigo', "=", $request->codigo)->exists()) {
            return response()->json([
                'erro' => 's',
                'mensagem' => 'Código do produto já cadastrado'
            ], 200);
        }

        try {

            $produto->nome_produto = $request->nome_produto;
            $produto->codigo = $request->codigo;
            $produto->estoque = $request->estoque;
            $produto->categoria = $request->categoria;
            $produto->fornecedor = $request->fornecedor;
            $produto->data_validade = $request->data_validade;
            $produto->descricao = $request->descricao;

            $produto->save();

            return response()->json([
                'erro' => 'n',
                'mensagem' => 'Produto cadastrado com sucesso'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'erro' => 's',
                'mensagem' => 'Erro ao cadastrar produto: ' . $e->getMessage()
            ], 200);
        }
    }
}