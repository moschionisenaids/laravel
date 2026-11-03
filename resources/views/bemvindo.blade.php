<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Controle de Estoque de Limpeza</title>


    <style>

        /* =========================================
           CONFIGURAÇÕES GERAIS
        ========================================= */

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

            overflow-x: hidden;

        }



        /* =========================================
           DECORAÇÕES DO FUNDO
        ========================================= */

        .circulo {

            position: fixed;

            border-radius: 50%;

            z-index: 0;

            pointer-events: none;

        }


        .circulo-1 {

            width: 420px;
            height: 420px;

            top: -230px;
            right: -100px;

            background: rgba(255, 255, 255, 0.18);

        }


        .circulo-2 {

            width: 320px;
            height: 320px;

            bottom: -180px;
            left: -100px;

            background: rgba(255, 255, 255, 0.13);

        }


        .circulo-3 {

            width: 120px;
            height: 120px;

            top: 28%;
            left: 4%;

            background: rgba(255, 255, 255, 0.10);

        }


        .pontinho {

            position: fixed;

            width: 13px;
            height: 13px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.65);

            z-index: 0;

        }


        .p1 {

            top: 12%;
            left: 7%;

        }


        .p2 {

            top: 25%;
            left: 15%;

            width: 8px;
            height: 8px;

        }


        .p3 {

            bottom: 20%;
            right: 7%;

        }


        .p4 {

            bottom: 12%;
            right: 18%;

            width: 9px;
            height: 9px;

        }



        /* =========================================
           PÁGINA PRINCIPAL
        ========================================= */

        .pagina {

            width: 92%;

            max-width: 1200px;

            min-height: 700px;

            margin: 40px auto;

            background: #f8d6e0;

            border-radius: 35px;

            position: relative;

            z-index: 2;

            overflow: hidden;

            box-shadow:
                0 25px 70px rgba(102, 20, 53, 0.30);

        }



        /* =========================================
           CABEÇALHO
        ========================================= */

        header {

            height: 85px;

            padding: 0 55px;

            background: rgba(255, 255, 255, 0.94);

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom:
                1px solid rgba(189, 62, 107, 0.10);

        }



        /* LOGO */

        .logo {

            display: flex;

            align-items: center;

            gap: 12px;

            color: #a93462;

            font-size: 19px;

            font-weight: 800;

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

            transform: rotate(-5deg);

            box-shadow:
                4px 4px 0 #f1a4bd;

        }


        .logo span {

            color: #d85c88;

        }



        /* BOTÃO ENTRAR */

        .login {

            text-decoration: none;

            padding: 12px 26px;

            background: #bd3e6b;

            color: white;

            border-radius: 25px;

            font-size: 14px;

            font-weight: bold;

            box-shadow:
                0 4px 0 #8f2d50;

            transition: 0.3s;

        }


        .login:hover {

            transform: translateY(-3px);

            background: #a8325d;

            box-shadow:
                0 7px 0 #8f2d50;

        }



        /* =========================================
           CONTEÚDO
        ========================================= */

        .conteudo {

            min-height: 615px;

            padding: 65px 70px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 70px;

        }



        /* =========================================
           LADO ESQUERDO
        ========================================= */

        .texto {

            width: 52%;

            position: relative;

            z-index: 5;

        }


        .tag {

            display: inline-block;

            padding: 8px 17px;

            border-radius: 20px;

            background: #ffffff;

            color: #bd3e6b;

            font-size: 11px;

            font-weight: bold;

            letter-spacing: 1.2px;

            margin-bottom: 20px;

            box-shadow:
                0 4px 10px rgba(150, 50, 90, 0.08);

        }



        /* =========================================
           TÍTULO
        ========================================= */

        .titulo {

            color: #b73565;

            font-family: Georgia, serif;

            font-size: 64px;

            line-height: 0.98;

            margin-bottom: 25px;

        }


        .titulo span {

            display: block;

        }


        .titulo .destaque {

            color: #c94a77;

            position: relative;

        }


        .titulo .destaque::after {

            content: "";

            display: block;

            width: 115px;

            height: 7px;

            background: #e982a7;

            border-radius: 10px;

            margin-top: 10px;

        }



        /* =========================================
           DESCRIÇÃO
        ========================================= */

        .descricao {

            max-width: 560px;

            color: #795867;

            font-size: 17px;

            line-height: 1.75;

            margin-bottom: 30px;

        }



        /* =========================================
           BOTÕES
        ========================================= */

        .botoes {

            display: flex;

            gap: 15px;

            flex-wrap: wrap;

        }


        .botao {

            text-decoration: none;

            padding: 14px 24px;

            border-radius: 28px;

            font-weight: bold;

            font-size: 15px;

            display: flex;

            align-items: center;

            gap: 10px;

            transition: 0.3s;

        }


        .botao:hover {

            transform: translateY(-4px);

        }



        /* BOTÃO PRINCIPAL */

        .btn-entrar {

            background: #bd3e6b;

            color: white;

            box-shadow:
                0 5px 0 #8f2d50;

        }


        .btn-entrar:hover {

            background: #a8325d;

            box-shadow:
                0 8px 0 #8f2d50;

        }



        /* BOTÃO CADASTRO */

        .btn-cadastro {

            background: #e982a7;

            color: white;

            box-shadow:
                0 5px 0 #c65b82;

        }


        .btn-cadastro:hover {

            background: #d96d95;

            box-shadow:
                0 8px 0 #c65b82;

        }



        /* =========================================
           BENEFÍCIOS
        ========================================= */

        .beneficios {

            display: flex;

            gap: 25px;

            margin-top: 35px;

            flex-wrap: wrap;

        }


        .beneficio {

            display: flex;

            align-items: center;

            gap: 8px;

            color: #795867;

            font-size: 13px;

            font-weight: bold;

        }


        .beneficio-icon {

            width: 25px;

            height: 25px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #ffffff;

            color: #bd3e6b;

            font-weight: bold;

            box-shadow:
                0 3px 7px rgba(80, 40, 55, 0.12);

        }



        /* =========================================
           LADO DIREITO
        ========================================= */

        .visual {

            width: 43%;

            min-height: 450px;

            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

        }



        /* =========================================
           CARD PRINCIPAL
        ========================================= */

        .card {

            width: 350px;

            background: #ffffff;

            border-radius: 30px;

            padding: 35px;

            position: relative;

            z-index: 4;

            box-shadow:
                12px 14px 0 rgba(189, 62, 107, 0.22);

            border:
                2px solid rgba(189, 62, 107, 0.08);

        }


        .card-topo {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 22px;

        }


        .icone {

            width: 75px;

            height: 75px;

            border-radius: 22px;

            background: #f7c6d5;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 39px;

            border:
                4px solid #e98aaa;

        }


        .status {

            padding: 7px 12px;

            background: #f7dce5;

            color: #bd3e6b;

            border-radius: 15px;

            font-size: 11px;

            font-weight: bold;

        }


        .card h2 {

            color: #b73565;

            font-family: Georgia, serif;

            font-size: 28px;

            margin-bottom: 10px;

        }


        .card > p {

            color: #806672;

            font-size: 14px;

            line-height: 1.6;

            margin-bottom: 20px;

        }



        /* =========================================
           INFORMAÇÕES
        ========================================= */

        .info {

            background: #fff5f8;

            padding: 13px;

            border-radius: 15px;

            margin-bottom: 10px;

            display: flex;

            align-items: center;

            gap: 12px;

            transition: 0.3s;

        }


        .info:hover {

            transform: translateX(5px);

            background: #fce9f0;

        }


        .info-icon {

            width: 35px;

            height: 35px;

            border-radius: 11px;

            background: #f5c6d6;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

        }


        .info-text {

            display: flex;

            flex-direction: column;

            gap: 2px;

        }


        .info-text small {

            color: #a08390;

            font-size: 10px;

        }


        .info-text strong {

            color: #6c4c5c;

            font-size: 12px;

        }



        /* =========================================
           DECORAÇÕES DO CARD
        ========================================= */

        .estrela {

            position: absolute;

            color: #ffffff;

            font-size: 38px;

            z-index: 2;

        }


        .estrela-1 {

            top: 5px;

            left: 30px;

            transform: rotate(15deg);

        }


        .estrela-2 {

            right: 5px;

            bottom: 20px;

            font-size: 30px;

        }


        .bolinha-card {

            position: absolute;

            border-radius: 50%;

            background: #e982a7;

            opacity: 0.5;

        }


        .bc1 {

            width: 55px;

            height: 55px;

            top: 35px;

            right: 20px;

        }


        .bc2 {

            width: 30px;

            height: 30px;

            bottom: 25px;

            left: 10px;

        }



        /* =========================================
           RODAPÉ
        ========================================= */

        footer {

            height: 55px;

            background: #b83c69;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            font-size: 12px;

        }


        footer strong {

            font-weight: bold;

        }



        /* =========================================
           RESPONSIVO
        ========================================= */

        @media (max-width: 950px) {

            .conteudo {

                flex-direction: column;

                text-align: center;

                padding: 55px 40px;

            }


            .texto {

                width: 100%;

                max-width: 700px;

            }


            .descricao {

                margin-left: auto;

                margin-right: auto;

            }


            .botoes {

                justify-content: center;

            }


            .beneficios {

                justify-content: center;

            }


            .visual {

                width: 100%;

            }

        }



        @media (max-width: 600px) {

            body {

                padding: 10px;

            }


            .pagina {

                width: 100%;

                margin: 10px auto;

                border-radius: 25px;

            }


            header {

                height: 70px;

                padding: 0 20px;

            }


            .logo {

                font-size: 15px;

            }


            .logo-icon {

                width: 37px;

                height: 37px;

                font-size: 18px;

            }


            .login {

                padding: 10px 18px;

                font-size: 12px;

            }


            .conteudo {

                padding: 45px 20px;

                gap: 45px;

            }


            .titulo {

                font-size: 45px;

            }


            .titulo .destaque {

                font-size: 39px;

            }


            .descricao {

                font-size: 15px;

            }


            .botao {

                width: 100%;

                justify-content: center;

            }


            .beneficios {

                gap: 12px;

                justify-content: center;

            }


            .visual {

                min-height: 390px;

            }


            .card {

                width: 100%;

                max-width: 330px;

                padding: 25px;

            }


            footer {

                text-align: center;

                padding: 10px;

            }

        }

    </style>

</head>


<body>


    <!-- ======================================
         DECORAÇÕES DO FUNDO
    ======================================= -->

    <div class="circulo circulo-1"></div>

    <div class="circulo circulo-2"></div>

    <div class="circulo circulo-3"></div>


    <div class="pontinho p1"></div>

    <div class="pontinho p2"></div>

    <div class="pontinho p3"></div>

    <div class="pontinho p4"></div>



    <!-- ======================================
         PÁGINA
    ======================================= -->

    <div class="pagina">


        <!-- ==================================
             CABEÇALHO
        =================================== -->

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


            <a href="/login" class="login">

                Entrar

            </a>


        </header>



        <!-- ==================================
             CONTEÚDO
        =================================== -->

        <main class="conteudo">


            <!-- ==================================
                 LADO ESQUERDO
            =================================== -->

            <section class="texto">


               

                <h1 class="titulo">

                    <span>
                        Bem-vindo
                    </span>

                    <span>
                        ao
                    </span>

                    <span class="destaque">
                        seu estoque!
                    </span>

                </h1>


                <p class="descricao">

                    Organize seus produtos de limpeza
                    de maneira simples, rápida e prática.

                    Tenha tudo sob controle em um único
                    lugar, desde a categoria e quantidade
                    até o fornecedor e a data de validade.

                </p>



                <!-- BOTÕES -->

                <div class="botoes">


                   


                    



                <!-- BENEFÍCIOS -->

                <div class="beneficios">


                    <div class="beneficio">

                        <span class="beneficio-icon">
                            ✓
                        </span>

                        Organização

                    </div>


                    <div class="beneficio">

                        <span class="beneficio-icon">
                            ✓
                        </span>

                        Praticidade

                    </div>


                    <div class="beneficio">

                        <span class="beneficio-icon">
                            ✓
                        </span>

                        Controle

                    </div>


                </div>


            </section>



            <!-- ==================================
                 LADO DIREITO
            =================================== -->

            <section class="visual">


                <span class="estrela estrela-1">
                    ✦
                </span>


                <span class="estrela estrela-2">
                    ✦
                </span>


                <div class="bolinha-card bc1"></div>

                <div class="bolinha-card bc2"></div>



                <!-- =================================
                     CARD
                ================================== -->

                <div class="card">


                    <div class="card-topo">


                        <div class="icone">
                            🧹
                        </div>


                        <div class="status">
                            ESTOQUE ATIVO
                        </div>


                    </div>


                    <h2>
                        Controle fácil
                    </h2>


                    <p>

                        Cadastre e organize todas as
                        informações dos seus produtos
                        de limpeza.

                    </p>



                    <!-- CATEGORIA -->

                    <div class="info">

                        <div class="info-icon">
                            🗂️
                        </div>


                        <div class="info-text">

                            <small>
                                CATEGORIA
                            </small>

                            <strong>
                                Produtos de limpeza
                            </strong>

                        </div>

                    </div>



                    <!-- PRODUTO -->

                    <div class="info">

                        <div class="info-icon">
                            🧴
                        </div>


                        <div class="info-text">

                            <small>
                                PRODUTO
                            </small>

                            <strong>
                                Nome do produto
                            </strong>

                        </div>

                    </div>



                    <!-- QUANTIDADE -->

                    <div class="info">

                        <div class="info-icon">
                            📦
                        </div>


                        <div class="info-text">

                            <small>
                                QUANTIDADE
                            </small>

                            <strong>
                                Controle do estoque
                            </strong>

                        </div>

                    </div>



                    <!-- FORNECEDOR -->

                    <div class="info">

                        <div class="info-icon">
                            🏪
                        </div>


                        <div class="info-text">

                            <small>
                                FORNECEDOR
                            </small>

                            <strong>
                                Informações do fornecedor
                            </strong>

                        </div>

                    </div>



                    <!-- VALIDADE -->

                    <div class="info">

                        <div class="info-icon">
                            📅
                        </div>


                        <div class="info-text">

                            <small>
                                DATA DE VALIDADE
                            </small>

                            <strong>
                                Acompanhe os vencimentos
                            </strong>

                        </div>

                    </div>


                </div>


            </section>


        </main>



        <!-- ==================================
             RODAPÉ
        =================================== -->

        <footer>

            <strong>
                Controle de Estoque de Limpeza
            </strong>

            <span>
                •
            </span>

            <span>
                Organização e praticidade
            </span>

        </footer>


    </div>


</body>

</html>