<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login - Controle de Estoque</title>


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
    


    <!-- SEU JS -->

    @vite('resources/js/login.js')


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            min-height: 100vh;

            font-family: Arial, Helvetica, sans-serif;

            background: linear-gradient(
                135deg,
                #f7b4cb 0%,
                #ed83a9 45%,
                #d95787 100%
            );

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 30px;
        }


        /* CONTAINER */

        .login-container {
            width: 92%;

            max-width: 1050px;

            min-height: 620px;

            background: #f8d6e0;

            border-radius: 35px;

            overflow: hidden;

            display: flex;

            box-shadow: 0 25px 70px rgba(102,20,53,0.30);
        }


        /* =========================
           LADO ESQUERDO
        ========================= */

        .lado-esquerdo {
            width: 48%;

            padding: 60px;

            background: linear-gradient(
                145deg,
                #c84c79,
                #b73565
            );

            color: white;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        /* LOGO */

        .logo {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 45px;
        }


        .logo-icon {
            width: 50px;

            height: 50px;

            border-radius: 16px;

            background: white;

            color: #bd3e6b;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 24px;
        }


        .logo-text {
            font-size: 20px;

            font-weight: bold;
        }


        .logo-text span {
            color: #ffdce8;
        }


        /* TEXTO */

        .lado-esquerdo h1 {
            font-family: Georgia, serif;

            font-size: 50px;

            line-height: 1.05;

            margin-bottom: 22px;
        }


        .lado-esquerdo h1 span {
            color: #f8c8d9;
        }


        .lado-esquerdo p {
            font-size: 17px;

            line-height: 1.7;

            max-width: 390px;

            color: #ffe9f0;
        }


        /* =========================
           LADO DIREITO
        ========================= */

        .lado-direito {
            width: 52%;

            background: #f8d6e0;

            padding: 60px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        /* TÍTULO */

        .titulo-login {
            text-align: center;

            margin-bottom: 35px;
        }


        .titulo-login .icone {
            width: 70px;

            height: 70px;

            background: white;

            border-radius: 22px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 18px;

            font-size: 28px;

            color: #bd3e6b;
        }


        .titulo-login h2 {
            color: #b73565;

            font-family: Georgia, serif;

            font-size: 36px;

            margin-bottom: 8px;
        }


        .titulo-login p {
            color: #876674;

            font-size: 15px;
        }


        /* =========================
           FORMULÁRIO
        ========================= */

        .formulario {
            width: 100%;

            max-width: 420px;

            margin: auto;
        }


        .campo {
            margin-bottom: 22px;
        }


        .campo label {
            display: block;

            color: #71364f;

            font-size: 16px;

            font-weight: bold;

            margin-bottom: 9px;
        }


        /* CAIXA DO INPUT */

        .input-box {
            position: relative;
        }


        /* ÍCONE DO CAMPO */

        .icone-campo {
            position: absolute;

            left: 17px;

            top: 50%;

            transform: translateY(-50%);

            width: 18px;

            height: 18px;

            z-index: 2;
        }


        /* ÍCONE DE CARTA */

        .email-icone::before {
            content: "";

            position: absolute;

            width: 17px;

            height: 12px;

            border: 2px solid #bd3e6b;

            border-radius: 3px;

            top: 3px;

            left: 0;
        }


        .email-icone::after {
            content: "";

            position: absolute;

            width: 9px;

            height: 9px;

            border-left: 2px solid #bd3e6b;

            border-bottom: 2px solid #bd3e6b;

            transform: rotate(-45deg);

            top: 0;

            left: 4px;
        }


        /* ÍCONE DE CADEADO */

        .senha-icone::before {
            content: "";

            position: absolute;

            width: 15px;

            height: 12px;

            border: 2px solid #bd3e6b;

            border-radius: 3px;

            bottom: 0;

            left: 1px;
        }


        .senha-icone::after {
            content: "";

            position: absolute;

            width: 9px;

            height: 9px;

            border: 2px solid #bd3e6b;

            border-bottom: none;

            border-radius: 8px 8px 0 0;

            top: 0;

            left: 4px;
        }


        /* INPUT */

        .input-box input {
            width: 100%;

            height: 54px;

            border: 2px solid transparent;

            outline: none;

            background: white;

            border-radius: 17px;

            padding: 0 52px;

            color: #654856;

            font-size: 16px;

            transition: .3s;
        }


        .input-box input::placeholder {
            color: #b095a0;
        }


        .input-box input:focus {
            border-color: #e982a7;

            box-shadow: 0 0 0 4px rgba(233,130,167,.15);
        }


        /* =========================
           BOTÃO MOSTRAR SENHA
        ========================= */

        .mostrar-senha {
            position: absolute;

            right: 15px;

            top: 50%;

            transform: translateY(-50%);

            width: 30px;

            height: 30px;

            border: none;

            background: transparent;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 0;
        }


        /* OLHO */

        .olho {
            width: 20px;

            height: 13px;

            border: 2px solid #bd3e6b;

            border-radius: 70% 20%;

            transform: rotate(45deg);

            position: relative;
        }


        .olho::after {
            content: "";

            position: absolute;

            width: 5px;

            height: 5px;

            background: #bd3e6b;

            border-radius: 50%;

            top: 2px;

            left: 5px;
        }


        .mostrar-senha:hover .olho {
            border-color: #8f2d50;
        }


        .mostrar-senha:hover .olho::after {
            background: #8f2d50;
        }


        /* =========================
           OPÇÕES
        ========================= */

        .opcoes {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin: 5px 3px 28px;
        }


        .lembrar {
            display: flex;

            align-items: center;

            gap: 7px;

            color: #80616e;

            font-size: 14px;
        }


        .lembrar input {
            width: 16px;

            height: 16px;

            accent-color: #bd3e6b;
        }


        .esqueci {
            text-decoration: none;

            color: #bd3e6b;

            font-size: 14px;

            font-weight: bold;
        }


        .esqueci:hover {
            color: #8f2d50;
        }


        /* =========================
           BOTÃO ENTRAR
        ========================= */

        .btn-entrar {
            width: 100%;

            height: 55px;

            border: none;

            border-radius: 17px;

            background: #bd3e6b;

            color: white;

            font-size: 17px;

            font-weight: bold;

            cursor: pointer;

            box-shadow: 0 5px 0 #8f2d50;

            transition: .3s;
        }


        .btn-entrar:hover {
            background: #a8325d;

            transform: translateY(-2px);

            box-shadow: 0 7px 0 #8f2d50;
        }


        /* =========================
           CADASTRO
        ========================= */

        .cadastro {
            text-align: center;

            margin-top: 28px;

            color: #80616e;

            font-size: 15px;
        }


        .cadastro a {
            color: #bd3e6b;

            text-decoration: none;

            font-weight: bold;
        }


        .cadastro a:hover {
            color: #8f2d50;

            text-decoration: underline;
        }


        /* =========================
           RESPONSIVO
        ========================= */

        @media(max-width: 800px) {

            .login-container {
                flex-direction: column;

                max-width: 500px;
            }


            .lado-esquerdo {
                width: 100%;

                padding: 40px;

                min-height: 300px;
            }


            .lado-esquerdo h1 {
                font-size: 40px;
            }


            .logo {
                margin-bottom: 25px;
            }


            .lado-direito {
                width: 100%;

                padding: 40px;
            }

        }


        @media(max-width: 500px) {

            body {
                padding: 15px;
            }


            .login-container {
                width: 95%;

                border-radius: 25px;
            }


            .lado-esquerdo {
                padding: 30px;
            }


            .lado-direito {
                padding: 35px 22px;
            }


            .lado-esquerdo h1 {
                font-size: 34px;
            }


            .opcoes {
                flex-direction: column;

                align-items: flex-start;

                gap: 12px;
            }

        }

    </style>

</head>


<body>


    <div class="login-container">


        <!-- =========================
             LADO ESQUERDO
        ========================= -->

        <div class="lado-esquerdo">


            <div class="logo">

           


                <div class="logo-text">

                

                </div>

            </div>


            <h1>

                Bem-vindo<br>

                <span>de volta!</span>

            </h1>


            <p>

                Acesse sua conta para continuar
                organizando e controlando os produtos
                de limpeza do seu estoque.

            </p>


        </div>



        <!-- =========================
             LADO DIREITO
        ========================= -->

        <div class="lado-direito">


            <div class="titulo-login">


                


                <h2>
                    Entrar
                </h2>


                <p>
                    Entre com seus dados para acessar o sistema
                </p>


            </div>



            <div class="formulario">


                <!-- EMAIL -->

                <div class="campo">


                    <label for="email">
                        Email
                    </label>


                    <div class="input-box">


                        <span class="icone-campo email-icone"></span>


                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Digite seu email"
                        >


                    </div>


                </div>



                <!-- SENHA -->

                <div class="campo">


                    <label for="senha">
                        Senha
                    </label>


                    <div class="input-box">


                        <span class="icone-campo senha-icone"></span>


                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                        >


                        <!-- MOSTRAR SENHA -->

                        <button
                            type="button"
                            class="mostrar-senha"
                            id="mostrarSenha"
                            title="Mostrar senha"
                        >

                            <span class="olho"></span>

                        </button>


                    </div>


                </div>



                <!-- OPÇÕES -->

                <div class="opcoes">


                    <label class="lembrar">


                        <input
                            type="checkbox"
                            id="lembrar"
                        >


                        Lembrar de mim


                    </label>


                    <a href="#" class="esqueci">

                        Esqueci minha senha

                    </a>


                </div>



                <!-- BOTÃO -->

                <button
                    id="entrar"
                    type="button"
                    class="btn-entrar"
                >

                    Entrar 

                </button>



                <!-- CADASTRO -->

                <div class="cadastro">

                    Ainda não possui uma conta?


                    <a href="/cadastro_usuario">

                        Cadastre-se

                    </a>

                </div>


            </div>


        </div>


    </div>



    <!-- =========================
         MOSTRAR / ESCONDER SENHA
    ========================= -->

    <script>

        $("#mostrarSenha").click(function () {

            let senha = $("#senha");


            if (senha.attr("type") === "password") {

                senha.attr("type", "text");

                $(this).attr(
                    "title",
                    "Esconder senha"
                );

            } else {

                senha.attr("type", "password");

                $(this).attr(
                    "title",
                    "Mostrar senha"
                );

            }

        });

    </script>


</body>

</html>