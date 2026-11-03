$(document).ready(function () {

    $("#categoria").val("Detergente");

    $("#btn-cadastrar").click(function () {

        let data = [];
        let nome = $("#nome_produto").val();
        //alert(nome);

        if (nome == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'O campo nome do produto não pode estar vazio!',

            });
            return;
        }

        data["nome"] = nome;

        let estoque = $("#estoque").val();

        if (estoque == '' || estoque < 0 || $.isNumeric(estoque) == false) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'O campo estoque não pode estar vazio, negativo ou conter letras!',

            });
            return 0;
        }
        data["estoque"] = estoque;

        let categoria = $("#categoria").val();
        data["categoria"] = categoria;
    
        let descricao = $("#descricao").val();

        if (descricao == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'O campo descrição não pode estar vazio!',
            });
            return;
        }
        data["descricao"] = descricao; 
        //alert(descricao);

        let fornecedor = $("#fornecedor").val();
        data["fornecedor"] = fornecedor;
        //alert(fornecedor);

        let codigo = $("#codigo").val();
        data["codigo"] = codigo;
        //alert(codigo);

        let data = $("#data").val();
        data["data"] = data;
        //alert(data);
    });

});