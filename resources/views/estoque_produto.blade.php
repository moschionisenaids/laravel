<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Estoque - Controle de Estoque</title>

    <!-- BOOTSTRAP -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.cookie@1.4.1/jquery.cookie.min.js"></script>

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/js/luzes.js')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #f7b4cb 0%, #ed83a9 45%, #d95787 100%);
            color: #6f304e;
        }

        .circulo {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
        }

        .circulo-1 {
            width: 420px;
            height: 420px;
            top: -230px;
            right: -100px;
            background: rgba(255,255,255,0.18);
        }

        .circulo-2 {
            width: 320px;
            height: 320px;
            bottom: -180px;
            left: -100px;
            background: rgba(255,255,255,0.13);
        }

        .pagina {
            width: 94%;
            max-width: 1250px;
            min-height: 90vh;
            margin: 30px auto;
            background: #f8d6e0;
            border-radius: 35px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(102,20,53,0.30);
            position: relative;
        }

        header {
            height: 85px;
            padding: 0 45px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #a93462;
            font-size: 19px;
            font-weight: bold;
        }

        .logo-icon {
            width: 43px;
            height: 43px;
            background: #c84c79;
            color: white;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 4px 4px 0 #f1a4bd;
        }

        .logo span {
            color: #d85c88;
        }

        /* BOTÃO SAIR */
        .botao-sair {
            text-decoration: none;
            background: #bd3e6b;
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: bold;
            box-shadow: 0 5px 0 #8f2d50;
            transition: .3s;
        }

        .botao-sair:hover {
            transform: translateY(-3px);
            background: #a8325d;
            color: white;
        }

        .conteudo {
            padding: 45px 55px 55px;
        }

        .titulo-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .titulo h1 {
            font-family: Georgia, serif;
            font-size: 42px;
            color: #b73565;
            margin-bottom: 8px;
        }

        .botao-cadastrar {
            text-decoration: none;
            background: #bd3e6b;
            color: white;
            padding: 14px 22px;
            border-radius: 25px;
            font-weight: bold;
            box-shadow: 0 5px 0 #8f2d50;
            transition: .3s;
        }

        .botao-cadastrar:hover {
            transform: translateY(-3px);
            background: #a8325d;
        }

        .resumo {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .resumo-card {
            background: white;
            border-radius: 22px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 17px;
            box-shadow: 0 8px 20px rgba(100,30,60,.08);
            transition: .3s;
        }

        .resumo-card:hover {
            transform: translateY(-4px);
        }

        .resumo-icon {
            width: 55px;
            height: 55px;
            border-radius: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            background: #f7dce5;
        }

        .resumo-card h3 {
            font-size: 27px;
            color: #b73565;
            margin-bottom: 4px;
        }

        .resumo-card p {
            font-size: 12px;
            color: #8b6a78;
        }

        .estoque-box {
            background: white;
            border-radius: 28px;
            padding: 28px;
            box-shadow: 0 10px 25px rgba(100,30,60,.08);
        }

        .estoque-topo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .estoque-topo h2 {
            font-family: Georgia, serif;
            color: #b73565;
            font-size: 25px;
        }

        .pesquisa {
            width: 230px;
            border: none;
            outline: none;
            background: #fff5f8;
            padding: 12px 17px;
            border-radius: 20px;
            color: #6f304e;
        }

        .pesquisa::placeholder {
            color: #a98a96;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 15px;
            color: #9a6378;
            font-size: 12px;
            text-transform: uppercase;
            border-bottom: 2px solid #f5dce5;
        }

        td {
            padding: 16px 15px;
            color: #684b59;
            font-size: 14px;
            border-bottom: 1px solid #f5e5eb;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .produto {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: bold;
        }

        .produto-icon {
            width: 40px;
            height: 40px;
            border-radius: 13px;
            background: #f8dce6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .status::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .disponivel {
            background: #f3dce5;
            color: #9d3e62;
        }

        .disponivel::before {
            background: #c84c79;
        }

        .baixo {
            background: #f8e4eb;
            color: #a95776;
        }

        .baixo::before {
            background: #e982a7;
        }

        .esgotado {
            background: #eeeeee;
            color: #777;
        }

        .esgotado::before {
            background: #777;
        }

        .quantidade {
            font-weight: bold;
            color: #b73565;
        }

        .sem-estoque {
            color: #777;
        }

        .acoes {
            display: flex;
            gap: 7px;
        }

        .acao {
            width: 35px;
            height: 35px;
            border-radius: 11px;
            border: none;
            background: #f8e2e9;
            color: #b73565;
            cursor: pointer;
            transition: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .acao:hover {
            background: #e982a7;
            color: white;
            transform: scale(1.05);
        }

        .acoes form {
            margin: 0;
        }

        .mensagem-vazia {
            text-align: center;
            padding: 30px;
            color: #9a6378;
        }

        .alerta-sucesso {
            background: #f3dce5;
            color: #9d3e62;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .alerta-erro {
            background: #fff0f0;
            color: #b00020;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        /* SWEET ALERT ROSA */
        .swal-popup-rosa {
            border-radius: 25px !important;
            background: #fffafd !important;
            color: #6f304e !important;
            padding: 25px !important;
            font-family: Arial, sans-serif !important;
        }

        .swal-titulo-rosa {
            color: #b73565 !important;
            font-family: Georgia, serif !important;
            font-size: 27px !important;
        }

        .swal-confirmar {
            background: #bd3e6b !important;
            color: white !important;
            border-radius: 20px !important;
            padding: 12px 23px !important;
            font-weight: bold !important;
            border: none !important;
            box-shadow: 0 4px 0 #8f2d50 !important;
        }

        .swal-cancelar {
            background: #f3dce5 !important;
            color: #9d3e62 !important;
            border-radius: 20px !important;
            padding: 12px 23px !important;
            font-weight: bold !important;
            border: none !important;
        }

        .swal-campo {
            width: 100% !important;
            margin: 5px 0 12px !important;
            padding: 11px 13px !important;
            border: 1px solid #edc3d2 !important;
            border-radius: 12px !important;
            background: #fff8fb !important;
            color: #6f304e !important;
            box-shadow: none !important;
            font-size: 14px !important;
        }

        .swal-campo:focus {
            border-color: #d95787 !important;
            box-shadow: 0 0 0 3px rgba(217,87,135,.12) !important;
        }

        .swal-label {
            display: block;
            text-align: left;
            color: #795867;
            font-weight: bold;
            margin-top: 10px;
            font-size: 13px;
        }

        .swal-estoque {
            background: #fff0f5;
            border-radius: 13px;
            padding: 13px;
            color: #795867;
            margin: 12px 0;
            text-align: center;
        }

        .swal2-validation-message {
            background: #ffe8f0 !important;
            color: #a92e5b !important;
            border-radius: 10px !important;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            color: #9a6378;
            font-size: 12px;
        }

        @media(max-width: 850px) {
            .resumo {
                grid-template-columns: 1fr;
            }

            .titulo-area {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .estoque-topo {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .pesquisa {
                width: 100%;
            }

            .estoque-box {
                overflow-x: auto;
            }

            table {
                min-width: 700px;
            }
        }

        @media(max-width: 600px) {
            .pagina {
                width: 96%;
                margin: 15px auto;
                border-radius: 25px;
            }

            header {
                padding: 0 20px;
            }

            .logo {
                font-size: 14px;
            }

            .conteudo {
                padding: 30px 20px;
            }

            .titulo h1 {
                font-size: 34px;
            }
        }
    </style>
</head>

<body>

    <div class="circulo circulo-1"></div>
    <div class="circulo circulo-2"></div>

    <div class="pagina">

        <header>
            <div class="logo">
                <div class="logo-icon">✦</div>
                <div>
                    Controle
                    <span>de Estoque</span>
                </div>
            </div>

            <a href="{{ url('/login') }}" class="botao-sair">
                Sair
            </a>
        </header>

        <main class="conteudo">

            @if(session('sucesso'))
                <div class="alerta-sucesso">
                    {{ session('sucesso') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alerta-erro">
                    @foreach($errors->all() as $erro)
                        <p>{{ $erro }}</p>
                    @endforeach
                </div>
            @endif

            <div class="titulo-area">
                <div class="titulo">
                    <h1>Estoque</h1>
                </div>

                <a href="/cadastro_produto" class="botao-cadastrar">
                    Cadastrar produto
                </a>
            </div>

            <!-- RESUMO -->
            <div class="resumo">

                <div class="resumo-card">
                    <div class="resumo-icon">📦</div>
                    <div>
                        <h3>{{ $totalEmEstoque }}</h3>
                        <p>Produtos em estoque</p>
                    </div>
                </div>

                <div class="resumo-card">
                    <div class="resumo-icon">⚠️</div>
                    <div>
                        <h3>{{ $produtosAcabando }}</h3>
                        <p>Produtos acabando</p>
                    </div>
                </div>

                <div class="resumo-card">
                    <div class="resumo-icon">🚫</div>
                    <div>
                        <h3>{{ $produtosEmFalta }}</h3>
                        <p>Produtos em falta</p>
                    </div>
                </div>

            </div>

            <!-- TABELA -->
            <div class="estoque-box">

                <div class="estoque-topo">
                    <h2>Produtos cadastrados</h2>

                    <input
                        type="text"
                        id="pesquisa"
                        class="pesquisa"
                        placeholder="🔎 Pesquisar produto..."
                    >
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Código</th>
                            <th>Categoria</th>
                            <th>Quantidade</th>
                            <th>Situação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody id="listaProdutos">

                        @forelse($produtos as $produto)

                            <tr class="linha-produto">

                                <td>
                                    <div class="produto">
                                        <div class="produto-icon">📦</div>
                                        {{ $produto->nome_produto }}
                                    </div>
                                </td>

                                <td>#{{ $produto->codigo }}</td>

                                <td>{{ $produto->categoria }}</td>

                                <td class="quantidade {{ $produto->estoque <= 0 ? 'sem-estoque' : '' }}">
                                    {{ $produto->estoque }} unidades
                                </td>

                                <td>
                                    @if($produto->estoque <= 0)
                                        <span class="status esgotado">Sem estoque</span>
                                    @elseif($produto->estoque <= $produto->limite_estoque_baixo)
                                        <span class="status baixo">Estoque baixo</span>
                                    @else
                                        <span class="status disponivel">Disponível</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="acoes">

                                        <!-- BOTÃO EDITAR -->
                                        <button
                                            type="button"
                                            class="acao botao-editar"
                                            title="Editar e movimentar estoque"
                                            data-url="{{ url('/produto/' . $produto->id . '/atualizar') }}"
                                            data-nome="{{ $produto->nome_produto }}"
                                            data-codigo="{{ $produto->codigo }}"
                                            data-categoria="{{ $produto->categoria }}"
                                            data-fornecedor="{{ $produto->fornecedor }}"
                                            data-validade="{{ $produto->data_validade ? \Carbon\Carbon::parse($produto->data_validade)->format('Y-m-d') : '' }}"
                                            data-descricao="{{ $produto->descricao }}"
                                            data-estoque="{{ $produto->estoque }}"
                                            data-limite="{{ $produto->limite_estoque_baixo }}"
                                        >
                                            ✏️
                                        </button>

                                        <!-- BOTÃO EXCLUIR -->
                                        <form
                                            action="{{ url('/produto/' . $produto->id . '/excluir') }}"
                                            method="POST"
                                            class="form-excluir"
                                            data-nome="{{ $produto->nome_produto }}"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="acao"
                                                title="Excluir produto"
                                            >
                                                🗑️
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="mensagem-vazia">
                                    Nenhum produto cadastrado ainda.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>

            </div>

            <footer>
                Controle de Estoque de Limpeza • Organização e praticidade
            </footer>

        </main>

    </div>

    <script>

        // ESTILO DOS SWEET ALERTS
        const estiloAlerta = {
            customClass: {
                popup: 'swal-popup-rosa',
                title: 'swal-titulo-rosa',
                confirmButton: 'swal-confirmar',
                cancelButton: 'swal-cancelar'
            },
            buttonsStyling: false
        };


        // PESQUISA
        const campoPesquisa = document.getElementById('pesquisa');

        campoPesquisa.addEventListener('input', function () {

            const pesquisa = this.value.toLowerCase();

            const linhas = document.querySelectorAll('.linha-produto');

            linhas.forEach(function (linha) {
                const conteudo = linha.textContent.toLowerCase();

                linha.style.display = conteudo.includes(pesquisa) ? '' : 'none';
            });

        });


        // FUNÇÃO PARA EVITAR PROBLEMAS COM CARACTERES ESPECIAIS
        function escaparHtml(valor) {

            return String(valor || "").replace(/[&<>"']/g, function(caractere) {

                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#39;'
                }[caractere];

            });

        }


        // EXCLUIR PRODUTO COM SWEET ALERT
        document.querySelectorAll(".form-excluir").forEach(function(form) {

            form.addEventListener("submit", function(event) {

                event.preventDefault();

                const formulario = this;
                const nome = escaparHtml(this.dataset.nome);

                Swal.fire({

                    ...estiloAlerta,

                    icon: "warning",

                    title: "Excluir produto?",

                    html: `
                        <p style="color:#795867;line-height:1.6">
                            Tem certeza que deseja excluir
                            <strong style="color:#b73565">${nome}</strong>?
                        </p>

                        <p style="font-size:13px;color:#a98a96;margin-top:10px">
                            Essa ação não poderá ser desfeita.
                        </p>
                    `,

                    showCancelButton: true,
                    confirmButtonText: "Sim, excluir",
                    cancelButtonText: "Cancelar",
                    reverseButtons: true

                }).then(function(resultado) {

                    if (resultado.isConfirmed) {
                        formulario.submit();
                    }

                });

            });

        });


        // EDITAR PRODUTO COM SWEET ALERT
        document.querySelectorAll(".botao-editar").forEach(function(botao) {

            botao.addEventListener("click", async function() {

                const dados = this.dataset;

                const resultado = await Swal.fire({

                    ...estiloAlerta,

                    title: "Editar produto",

                    width: 570,

                    html: `

                        <div style="text-align:left">

                            <label class="swal-label">Nome do produto</label>
                            <input
                                id="swal_nome"
                                class="swal2-input swal-campo"
                                value="${escaparHtml(dados.nome)}"
                            >

                            <label class="swal-label">Código</label>
                            <input
                                id="swal_codigo"
                                class="swal2-input swal-campo"
                                value="${escaparHtml(dados.codigo)}"
                            >

                            <label class="swal-label">Categoria</label>
                            <select id="swal_categoria" class="swal2-select swal-campo">
                                <option value="Detergente">Detergente</option>
                                <option value="Desinfetante">Desinfetante</option>
                                <option value="agua_sanitaria">Água Sanitária</option>
                                <option value="alcool">Álcool</option>
                                <option value="sabao">Sabão</option>
                                <option value="multiuso">Multiuso</option>
                            </select>

                            <label class="swal-label">Fornecedor</label>
                            <input
                                id="swal_fornecedor"
                                class="swal2-input swal-campo"
                                value="${escaparHtml(dados.fornecedor)}"
                            >

                            <label class="swal-label">Data de validade</label>
                            <input
                                id="swal_validade"
                                type="date"
                                class="swal2-input swal-campo"
                                value="${escaparHtml(dados.validade)}"
                            >

                            <label class="swal-label">Descrição</label>
                            <textarea
                                id="swal_descricao"
                                class="swal2-textarea swal-campo"
                                rows="2"
                            >${escaparHtml(dados.descricao)}</textarea>

                            <hr style="border:0;border-top:1px solid #f5dce5;margin:20px 0">

                            <h3 style="color:#b73565;font-family:Georgia,serif">
                                📦 Movimentar estoque
                            </h3>

                            <div class="swal-estoque">
                                Quantidade atual:
                                <strong style="color:#b73565">
                                    ${escaparHtml(dados.estoque)}
                                </strong>
                                unidades
                            </div>

                            <label class="swal-label">Limite para estoque acabando</label>
                            <input
                                id="swal_limite"
                                type="number"
                                min="1"
                                class="swal2-input swal-campo"
                                value="${escaparHtml(dados.limite)}"
                            >

                            <label class="swal-label">O que deseja fazer?</label>

                            <select id="swal_operacao" class="swal2-select swal-campo">
                                <option value="manter">Não alterar estoque</option>
                                <option value="repor">➕ Repor produtos</option>
                                <option value="retirar">➖ Retirar produtos</option>
                            </select>

                            <label class="swal-label">Quantidade</label>

                            <input
                                id="swal_quantidade"
                                type="number"
                                min="1"
                                class="swal2-input swal-campo"
                                placeholder="Digite a quantidade"
                                disabled
                            >

                        </div>

                    `,

                    showCancelButton: true,

                    confirmButtonText: "Salvar alterações",

                    cancelButtonText: "Cancelar",

                    reverseButtons: true,

                    focusConfirm: false,


                    // CONFIGURAR CAMPOS
                    didOpen: function() {

                        const categoria = document.getElementById("swal_categoria");
                        const operacao = document.getElementById("swal_operacao");
                        const quantidade = document.getElementById("swal_quantidade");

                        categoria.value = dados.categoria;

                        operacao.addEventListener("change", function() {

                            quantidade.disabled = this.value === "manter";

                            if (this.value === "manter") {
                                quantidade.value = "";
                            }

                        });

                    },


                    // VALIDAR INFORMAÇÕES
                    preConfirm: function() {

                        const nome = document.getElementById("swal_nome").value.trim();

                        const codigo = document.getElementById("swal_codigo").value.trim();

                        const categoria = document.getElementById("swal_categoria").value;

                        const fornecedor = document.getElementById("swal_fornecedor").value;

                        const validade = document.getElementById("swal_validade").value;

                        const descricao = document.getElementById("swal_descricao").value;

                        const limite = document.getElementById("swal_limite").value;

                        const operacao = document.getElementById("swal_operacao").value;

                        const quantidade = document.getElementById("swal_quantidade").value;


                        if (!nome || !codigo || !categoria) {

                            Swal.showValidationMessage(
                                "Preencha nome, código e categoria."
                            );

                            return false;

                        }

                        if (
                            !limite ||
                            Number(limite) < 1 ||
                            !Number.isInteger(Number(limite))
                        ) {
                            Swal.showValidationMessage(
                                "Informe um limite de estoque válido (mínimo 1)."
                            );

                            return false;
                        }


                        if (
                            operacao !== "manter" &&
                            (
                                !quantidade ||
                                Number(quantidade) < 1 ||
                                !Number.isInteger(Number(quantidade))
                            )
                        ) {

                            Swal.showValidationMessage(
                                "Informe uma quantidade válida."
                            );

                            return false;

                        }


                        if (
                            operacao === "retirar" &&
                            Number(quantidade) > Number(dados.estoque)
                        ) {

                            Swal.showValidationMessage(
                                "Você não possui essa quantidade em estoque."
                            );

                            return false;

                        }


                        return {

                            nome_produto: nome,
                            codigo: codigo,
                            categoria: categoria,
                            fornecedor: fornecedor,
                            data_validade: validade,
                            descricao: descricao,
                            limite_estoque_baixo: limite,
                            operacao: operacao,
                            quantidade: quantidade

                        };

                    }

                });


                // ENVIAR DADOS PARA O LARAVEL
                if (!resultado.isConfirmed) {
                    return;
                }

                const formulario = document.createElement("form");

                formulario.method = "POST";

                formulario.action = dados.url;

                const csrf = document.querySelector(
                    'meta[name="csrf-token"]'
                ).content;

                const dadosEnviar = {
                    _token: csrf,
                    ...resultado.value
                };

                Object.keys(dadosEnviar).forEach(function(chave) {

                    const input = document.createElement("input");

                    input.type = "hidden";

                    input.name = chave;

                    input.value = dadosEnviar[chave];

                    formulario.appendChild(input);

                });

                document.body.appendChild(formulario);

                formulario.submit();

            });

        });


        // MENSAGEM DE SUCESSO
        @if(session('sucesso'))

            Swal.fire({

                ...estiloAlerta,

                icon: "success",

                title: "Tudo certinho!",

                text: @json(session('sucesso')),

                confirmButtonText: "Continuar"

            });

        @endif

    </script>

</body>
</html>