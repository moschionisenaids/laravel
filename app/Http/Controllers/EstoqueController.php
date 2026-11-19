<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Validation\Rule;

class EstoqueController extends Controller
{
    public function estoque_produtos_html(Request $request)
    {
        $produtos = Produto::orderBy('nome_produto')->get();

        $totalEmEstoque = $produtos->where('estoque', '>', 0)->count();

        $produtosAcabando = $produtos
    ->filter(function ($produto) {
        return $produto->estoque > 0 &&
               $produto->estoque <= $produto->limite_estoque_baixo;
    })
    ->count();

        $produtosEmFalta = $produtos
            ->where('estoque', '<=', 0)
            ->count();

        return view('estoque_produto', compact(
            'produtos',
            'totalEmEstoque',
            'produtosAcabando',
            'produtosEmFalta'
        ));
    }

    // Editar produto e movimentar estoque
    public function atualizarProduto(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $dados = $request->validate([
            'nome_produto' => 'required|string|max:255',
            'codigo' => [
                'required',
                'string',
                Rule::unique('produto', 'codigo')->ignore($produto->id),
            ],
            'categoria' => 'required|string',
            'fornecedor' => 'nullable|string|max:255',
            'data_validade' => 'nullable|date',
            'descricao' => 'nullable|string',
            'operacao' => 'required|in:manter,repor,retirar',
            'quantidade' => 'required_if:operacao,repor,retirar|nullable|integer|min:1',
            'limite_estoque_baixo' => 'required|integer|min:1',
        ]);

        $quantidade = (int) ($dados['quantidade'] ?? 0);

        if ($dados['operacao'] === 'retirar' && $quantidade > $produto->estoque) {
            return back()
                ->withErrors(['quantidade' => 'Não é possível retirar mais unidades do que existem no estoque.'])
                ->withInput();
        }

        // Atualiza os dados do produto
        $produto->nome_produto = $dados['nome_produto'];
        $produto->codigo = $dados['codigo'];
        $produto->categoria = $dados['categoria'];
        $produto->fornecedor = $dados['fornecedor'] ?? null;
        $produto->data_validade = $dados['data_validade'] ?? null;
        $produto->descricao = $dados['descricao'] ?? null;
        $produto->limite_estoque_baixo = $dados['limite_estoque_baixo'];

        // Atualiza a quantidade
        if ($dados['operacao'] === 'repor') {
            $produto->estoque += $quantidade;
        } elseif ($dados['operacao'] === 'retirar') {
            $produto->estoque -= $quantidade;
        }

        $produto->save();

        return redirect('/estoque')->with('sucesso', 'Produto atualizado com sucesso!');
    }

    // Excluir produto
    public function excluirProduto($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect('/estoque')->with('sucesso', 'Produto excluído com sucesso!');
    }
}
