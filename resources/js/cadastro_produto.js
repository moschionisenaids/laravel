$(document).ready(function (){

    $("#cadastrar").click(function (){

        
        $.ajax({
            url: "api/cadastro_produto",
            method: "POST",
            data: {
                nome_produto: $("#nome_produto").val(),
                codigo: $("#codigo").val(),
                estoque: $("#estoque").val(),
                categoria: $("#categoria").val(),
                fornecedor: $("#fornecedor").val(),
                data_validade: $("#data_validade").val(),
                descricao: $("#descricao").val(),
            },
            success: function (response) {
                console.log(response);
                console.log(response['erro']);
                if(response['erro'] == 'n'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Cadastro realizado com sucesso!'
                        
                        
                    }).then(() => {
                        window.location.href = "/estoque";
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: response['mensagem']
                    });
                }
            }
        });
    });

});