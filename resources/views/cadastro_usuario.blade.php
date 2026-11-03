<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/js/cadastro_usuario.js')


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            min-height: 100vh;

            font-family: Arial, sans-serif;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 35px;

            background:
                radial-gradient(
                    circle at 8% 20%,
                    rgba(255,255,255,0.16) 0 90px,
                    transparent 91px
                ),

                radial-gradient(
                    circle at 92% 80%,
                    rgba(255,255,255,0.12) 0 130px,
                    transparent 131px
                ),

                linear-gradient(
                    135deg,
                    #df5b91,
                    #f19ab8,
                    #d94279
                );
        }


        /* CARD */

        .cadastro-container {

            width: 100%;

            max-width: 900px;

            background: #ffe1ea;

            border-radius: 28px;

            padding: 50px 60px 45px;

            box-shadow:
                0 25px 60px rgba(117, 28, 67, 0.28);

            border: 1px solid rgba(255,255,255,0.8);
        }


        /* TÍTULO */

        .titulo {

            text-align: center;

            color: #b73567;

            font-family: Georgia, serif;

            font-size: 56px;

            line-height: 1.05;

            font-weight: bold;

            margin: 0;
        }


        .subtitulo {

            text-align: center;

            color: #875367;

            font-size: 19px;

            margin-top: 12px;

            margin-bottom: 20px;
        }


        /* LINHA */

        .linha {

            width: 75px;

            height: 5px;

            background: #d95a89;

            border-radius: 20px;

            margin: 0 auto 38px;
        }


        /* CAMPOS */

        .campo {

            margin-bottom: 24px;
        }


        .campo label {

            display: block;

            color: #b73567;

            font-weight: 600;

            font-size: 17px;

            margin-bottom: 9px;
        }


        .form-control {

            height: 53px;

            border-radius: 12px;

            border: 1px solid #e1b8c7;

            background: #ffffff;

            padding: 10px 17px;

            color: #555;

            font-size: 16px;

            transition: 0.2s;
        }


        .form-control::placeholder {

            color: #aaa;
        }


        .form-control:focus {

            border-color: #d95a89;

            box-shadow:
                0 0 0 4px rgba(217, 90, 137, 0.12);

            background: white;
        }


        /* BOTÃO */

        .botoes {

            display: flex;

            justify-content: center;

            margin-top: 10px;
        }


        .btn-cadastrar {

            width: 230px;

            height: 52px;

            border: none;

            border-radius: 12px;

            background: #c63f73;

            color: white;

            font-size: 17px;

            font-weight: bold;

            box-shadow:
                0 5px 0 #9f2e59;

            transition: 0.2s;
        }


        .btn-cadastrar:hover {

            background: #b43667;

            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 7px 0 #9f2e59;
        }


        /* LOGIN */

        .login {

            text-align: center;

            margin-top: 25px;

            color: #765663;

            font-size: 16px;
        }


        .login a {

            color: #b73567;

            font-weight: bold;

            text-decoration: none;

            margin-left: 4px;

            transition: 0.2s;
        }


        .login a:hover {

            color: #8f2852;

            text-decoration: underline;
        }


        /* RESPONSIVO */

        @media (max-width: 700px) {

            body {

                padding: 15px;
            }


            .cadastro-container {

                padding: 35px 22px;
            }


            .titulo {

                font-size: 43px;
            }


            .subtitulo {

                font-size: 17px;
            }


            .campo label {

                font-size: 16px;
            }


            .form-control {

                font-size: 15px;
            }


            .btn-cadastrar {

                width: 100%;
            }

        }

    </style>

</head>


<body>


    <div class="cadastro-container">


        <h1 class="titulo">

            Cadastro<br>


        </h1>


        <p class="subtitulo">

            Crie sua conta para acessar o sistema

        </p>


        <div class="linha"></div>


        <div class="row">


            <!-- NOME -->

            <div class="col-md-6 campo">

                <label for="nome">

                    Nome

                </label>

                <input
                    type="text"
                    class="form-control"
                    id="nome"
                    name="nome"
                    placeholder="Digite seu nome">

            </div>


            <!-- EMAIL -->

            <div class="col-md-6 campo">

                <label for="email">

                    E-mail

                </label>

                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Digite seu e-mail">

            </div>


            <!-- SENHA -->

            <div class="col-md-6 campo">

                <label for="senha">

                    Senha

                </label>

                <input
                    type="password"
                    class="form-control"
                    id="senha"
                    name="senha"
                    placeholder="Digite sua senha">

            </div>


            <!-- DATA -->

            <div class="col-md-3 campo">

                <label for="data_nascimento">

                    Data de Nascimento

                </label>

                <input
                    type="date"
                    class="form-control"
                    id="data_nascimento"
                    name="data_nascimento">

            </div>


            <!-- CPF -->

            <div class="col-md-3 campo">

                <label for="cpf">

                    CPF

                </label>

                <input
                    type="text"
                    class="form-control"
                    id="cpf"
                    name="cpf"
                    placeholder="Digite seu CPF">

            </div>


        </div>


        <!-- CADASTRAR -->

        <div class="botoes">

            <button
                type="button"
                id="cadastro_usuario"
                class="btn-cadastrar">

                Cadastrar

            </button>

        </div>


        <!-- LOGIN -->

        <div class="login">

            Já possui uma conta?

            <a href="/login">

                Faça login

            </a>

        </div>


    </div>


</body>

</html>