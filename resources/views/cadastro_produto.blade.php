
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cadastro de Produtos de Limpeza</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('estilo.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/js/cadastro_produto.js')
</head>

<body>

<div class="container shadow-lg">

    <div class="titulo">
        <img src="{{ asset('Controle de Estoqueee.png') }}"
             alt="Logo Controle de Estoque"
             class="logo-titulo">
    </div>

    <form id="formCadastro">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    <i class="bi bi-droplet-fill"></i>
                    Nome do Produto
                </label>

                <input
                    type="text"
                    class="form-control"
                    placeholder="Digite o nome do produto"
                    id="nome_produto"
                    required
                >
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    <i class="bi bi-upc-scan"></i>
                    Código
                </label>

                <input
                    type="text"
                    class="form-control"
                    placeholder="Ex.: LIM001"
                    id="codigo"
                    required
                >
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    <i class="bi bi-boxes"></i>
                    Quantidade atual em estoque
                </label>

                <input
                    type="number"
                    class="form-control"
                    id="estoque"
                    min="0"
                    placeholder="Ex.: 20"
                    required
                >

            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    Limite para estoque acabando
                </label>

                <input
                    type="number"
                    class="form-control"
                    id="limite_estoque_baixo"
                    min="1"
                    value="5"
                    placeholder="Ex.: 5"
                    required
                >

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    <i class="bi bi-tags-fill"></i>
                    Categoria
                </label>

                <select class="form-select" id="categoria" required>
                    <option value="" selected disabled>Selecione...</option>
                    <option value="Detergente">Detergente</option>
                    <option value="Desinfetante">Desinfetante</option>
                    <option value="agua_sanitaria">Água Sanitária</option>
                    <option value="alcool">Álcool</option>
                    <option value="sabao">Sabão</option>
                    <option value="multiuso">Multiuso</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    <i class="bi bi-truck"></i>
                    Fornecedor
                </label>

                <input
                    type="text"
                    class="form-control"
                    placeholder="Digite o fornecedor"
                    id="fornecedor"
                    required
                >
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">
                    <i class="bi bi-calendar-check"></i>
                    Data de Validade
                </label>

                <input
                    type="date"
                    class="form-control"
                    id="data_validade"
                    required
                >
            </div>

        </div>

        <div class="mb-4">
            <label class="form-label">
                <i class="bi bi-card-text"></i>
                Descrição
            </label>

            <textarea
                class="form-control"
                rows="5"
                placeholder="Digite uma descrição do produto"
                id="descricao"
                required
            ></textarea>
        </div>

        <div class="text-center">

            <button type="button" class="btn btn-success me-2" id="cadastrar">
                <i class="bi bi-check-circle-fill"></i>
                Cadastrar
            </button>

            <button type="button" class="btn btn-warning me-2" id="limpar">
                <i class="bi bi-arrow-clockwise"></i>
                Limpar
            </button>

            <button type="button" class="btn btn-danger" id="cancelar">
                <i class="bi bi-x-circle-fill"></i>
                Cancelar
            </button>

        </div>

    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
