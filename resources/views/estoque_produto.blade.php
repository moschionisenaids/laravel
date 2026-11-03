<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Estoque - Controle de Estoque</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            min-height: 100vh;

            font-family: Arial, Helvetica, sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f7b4cb 0%,
                    #ed83a9 45%,
                    #d95787 100%
                );

            color: #6f304e;

        }


        /* =========================
           FUNDO
        ========================= */

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


        /* =========================
           CONTAINER
        ========================= */

        .pagina {

            width: 94%;

            max-width: 1250px;

            min-height: 90vh;

            margin: 30px auto;

            background: #f8d6e0;

            border-radius: 35px;

            overflow: hidden;

            box-shadow:
                0 25px 70px rgba(102,20,53,0.30);

            position: relative;

        }


        /* =========================
           HEADER
        ========================= */

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


        .voltar {

            text-decoration: none;

            color: #bd3e6b;

            font-weight: bold;

            font-size: 14px;

            padding: 11px 20px;

            border-radius: 20px;

            transition: .3s;

        }


        .voltar:hover {

            background: #f8d6e0;

        }


        /* =========================
           CONTEÚDO
        ========================= */

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


        .titulo p {

            color: #795867;

            font-size: 15px;

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


        /* =========================
           RESUMO
        ========================= */

        .resumo {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

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

            box-shadow:
                0 8px 20px rgba(100,30,60,.08);

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


        /* =========================
           TABELA
        ========================= */

        .estoque-box {

            background: white;

            border-radius: 28px;

            padding: 28px;

            box-shadow:
                0 10px 25px rgba(100,30,60,.08);

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

        }


        /* =========================
           STATUS
        ========================= */

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


        /* TEM */

        .disponivel {

            background: #f3dce5;

            color: #9d3e62;

        }


        .disponivel::before {

            background: #c84c79;

        }


        /* ACABANDO */

        .baixo {

            background: #f8e4eb;

            color: #a95776;

        }


        .baixo::before {

            background: #e982a7;

        }


        /* NÃO TEM */

        .esgotado {

            background: #eeeeee;

            color: #777;

        }


        .esgotado::before {

            background: #777;

        }


        /* =========================
           QUANTIDADE
        ========================= */

        .quantidade {

            font-weight: bold;

            color: #b73565;

        }


        .sem-estoque {

            color: #777;

        }


        /* =========================
           BOTÕES
        ========================= */

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

        }


        .acao:hover {

            background: #e982a7;

            color: white;

            transform: scale(1.05);

        }


        /* =========================
           RODAPÉ
        ========================= */

        footer {

            margin-top: 30px;

            text-align: center;

            color: #9a6378;

            font-size: 12px;

        }


        /* =========================
           RESPONSIVO
        ========================= */

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


    <!-- DECORAÇÕES -->

    <div class="circulo circulo-1"></div>

    <div class="circulo circulo-2"></div>



    <div class="pagina">


        <!-- HEADER -->

        <header>


            <div class="logo">

                <div class="logo-icon">
                    ✦
                </div>

                <div>

                    Controle

                    <span>
                        de Estoque
                    </span>

                </div>

            </div>


           


        </header>



        <!-- CONTEÚDO -->

        <main class="conteudo">


            <!-- TÍTULO -->

            <div class="titulo-area">


                <div class="titulo">

                    <h1>
                        Estoque
                    </h1>

                    

                </div>


                <a href="/cadastro_produto" class="botao-cadastrar">
                    Cadastrar produto
                </a>


            </div>



            <!-- RESUMO -->

            <div class="resumo">


                <div class="resumo-card">

                    <div class="resumo-icon">
                        📦
                    </div>

                    <div>

                        <h3>
                            24
                        </h3>

                        <p>
                            Produtos em estoque
                        </p>

                    </div>

                </div>



                <div class="resumo-card">

                    <div class="resumo-icon">
                        ⚠️
                    </div>

                    <div>

                        <h3>
                            5
                        </h3>

                        <p>
                            Produtos acabando
                        </p>

                    </div>

                </div>



                <div class="resumo-card">

                    <div class="resumo-icon">
                        🚫
                    </div>

                    <div>

                        <h3>
                            3
                        </h3>

                        <p>
                            Produtos em falta
                        </p>

                    </div>

                </div>


            </div>



            <!-- ESTOQUE -->

            <div class="estoque-box">


                <div class="estoque-topo">

                    <h2>
                        Produtos cadastrados
                    </h2>


                    <input
                        type="text"
                        class="pesquisa"
                        placeholder="🔎  Pesquisar produto..."
                    >

                </div>



                <table>


                    <thead>

                        <tr>

                            <th>
                                Produto
                            </th>

                            <th>
                                Código
                            </th>

                            <th>
                                Categoria
                            </th>

                            <th>
                                Quantidade
                            </th>

                            <th>
                                Situação
                            </th>

                            <th>
                                Ações
                            </th>

                        </tr>

                    </thead>



                    <tbody>


                        <!-- PRODUTO 1 -->

                        <tr>

                            <td>

                                <div class="produto">

                                    <div class="produto-icon">
                                        🧴
                                    </div>

                                    Detergente

                                </div>

                            </td>

                            <td>
                                #001
                            </td>

                            <td>
                                Limpeza
                            </td>

                            <td class="quantidade">
                                15 unidades
                            </td>

                            <td>

                                <span class="status disponivel">
                                    Disponível
                                </span>

                            </td>

                            <td>

                                <div class="acoes">

                                    <button class="acao">
                                        ✏️
                                    </button>

                                    <button class="acao">
                                        🗑️
                                    </button>

                                </div>

                            </td>

                        </tr>



                        <!-- PRODUTO 2 -->

                        <tr>

                            <td>

                                <div class="produto">

                                    <div class="produto-icon">
                                        🧹
                                    </div>

                                    Vassoura

                                </div>

                            </td>

                            <td>
                                #002
                            </td>

                            <td>
                                Limpeza
                            </td>

                            <td class="quantidade">
                                8 unidades
                            </td>

                            <td>

                                <span class="status disponivel">
                                    Disponível
                                </span>

                            </td>

                            <td>

                                <div class="acoes">

                                    <button class="acao">
                                        ✏️
                                    </button>

                                    <button class="acao">
                                        🗑️
                                    </button>

                                </div>

                            </td>

                        </tr>



                        <!-- PRODUTO 3 -->

                        <tr>

                            <td>

                                <div class="produto">

                                    <div class="produto-icon">
                                        🧽
                                    </div>

                                    Esponja

                                </div>

                            </td>

                            <td>
                                #003
                            </td>

                            <td>
                                Limpeza
                            </td>

                            <td class="quantidade">
                                3 unidades
                            </td>

                            <td>

                                <span class="status baixo">
                                    Estoque baixo
                                </span>

                            </td>

                            <td>

                                <div class="acoes">

                                    <button class="acao">
                                        ✏️
                                    </button>

                                    <button class="acao">
                                        🗑️
                                    </button>

                                </div>

                            </td>

                        </tr>



                        <!-- PRODUTO 4 -->

                        <tr>

                            <td>

                                <div class="produto">

                                    <div class="produto-icon">
                                        🧼
                                    </div>

                                    Sabão em pó

                                </div>

                            </td>

                            <td>
                                #004
                            </td>

                            <td>
                                Lavanderia
                            </td>

                            <td class="quantidade">
                                10 unidades
                            </td>

                            <td>

                                <span class="status disponivel">
                                    Disponível
                                </span>

                            </td>

                            <td>

                                <div class="acoes">

                                    <button class="acao">
                                        ✏️
                                    </button>

                                    <button class="acao">
                                        🗑️
                                    </button>

                                </div>

                            </td>

                        </tr>



                        <!-- PRODUTO 5 -->

                        <tr>

                            <td>

                                <div class="produto">

                                    <div class="produto-icon">
                                        🧴
                                    </div>

                                    Água sanitária

                                </div>

                            </td>

                            <td>
                                #005
                            </td>

                            <td>
                                Limpeza
                            </td>

                            <td class="quantidade">
                                2 unidades
                            </td>

                            <td>

                                <span class="status baixo">
                                    Estoque baixo
                                </span>

                            </td>

                            <td>

                                <div class="acoes">

                                    <button class="acao">
                                        ✏️
                                    </button>

                                    <button class="acao">
                                        🗑️
                                    </button>

                                </div>

                            </td>

                        </tr>



                        <!-- PRODUTO 6 -->

                        <tr>

                            <td>

                                <div class="produto">

                                    <div class="produto-icon">
                                        🧻
                                    </div>

                                    Papel toalha

                                </div>

                            </td>

                            <td>
                                #006
                            </td>

                            <td>
                                Higiene
                            </td>

                            <td class="quantidade sem-estoque">
                                0 unidades
                            </td>

                            <td>

                                <span class="status esgotado">
                                    Sem estoque
                                </span>

                            </td>

                            <td>

                                <div class="acoes">

                                    <button class="acao">
                                        ✏️
                                    </button>

                                    <button class="acao">
                                        🗑️
                                    </button>

                                </div>

                            </td>

                        </tr>


                    </tbody>


                </table>


            </div>



            <footer>

                Controle de Estoque de Limpeza • Organização e praticidade

            </footer>


        </main>


    </div>


</body>

</html>