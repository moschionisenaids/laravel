<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CadastroProdutoController extends Controller
{
    public function cadastro_produto_html(Request $request)
    {
        return view('cadastro_produto');
    }

    public function cadastro_produto(Request $request)
    {
        $dados = $request->validate([
            'nome_produto' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
            'estoque' => 'required|integer|min:0',
            'limite_estoque_baixo' => 'required|integer|min:1',
            'categoria' => 'required|string|max:255',
            'fornecedor' => 'required|string|max:255',
            'data_validade' => 'required|date',
            'descricao' => 'required|string',
        ]);

        if (Produto::where('codigo', $dados['codigo'])->exists()) {
            return response()->json([
                'erro' => 's',
                'mensagem' => 'Código do produto já cadastrado'
            ], 200);
        }

        try {
            $produto = new Produto();
            $produto->nome_produto = $dados['nome_produto'];
            $produto->codigo = $dados['codigo'];
            $produto->estoque = $dados['estoque'];
            $produto->limite_estoque_baixo = $dados['limite_estoque_baixo'];
            $produto->categoria = $dados['categoria'];
            $produto->fornecedor = $dados['fornecedor'];
            $produto->data_validade = $dados['data_validade'];
            $produto->descricao = $dados['descricao'];
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
