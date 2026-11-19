
$(document).ready(function () {

    // CADASTRAR PRODUTO
    $("#cadastrar").click(function (e) {

        e.preventDefault();

        const dados = {
            nome_produto: $("#nome_produto").val().trim(),
            codigo: $("#codigo").val().trim(),
            estoque: $("#estoque").val(),
            limite_estoque_baixo: $("#limite_estoque_baixo").val(),
            categoria: $("#categoria").val(),
            fornecedor: $("#fornecedor").val().trim(),
            data_validade: $("#data_validade").val(),
            descricao: $("#descricao").val().trim()
        };

        if (
            !dados.nome_produto ||
            !dados.codigo ||
            !dados.categoria ||
            !dados.fornecedor ||
            !dados.descricao
        ) {
            Swal.fire({
                icon: "warning",
                title: "Atenção!",
                text: "Preencha todos os campos do cadastro."
            });
            return;
        }

        if (
            dados.estoque === "" ||
            Number(dados.estoque) < 0 ||
            !Number.isInteger(Number(dados.estoque))
        ) {
            Swal.fire({
                icon: "warning",
                title: "Quantidade inválida!",
                text: "Informe uma quantidade atual válida."
            });
            return;
        }

        if (
            dados.limite_estoque_baixo === "" ||
            Number(dados.limite_estoque_baixo) < 1 ||
            !Number.isInteger(Number(dados.limite_estoque_baixo))
        ) {
            Swal.fire({
                icon: "warning",
                title: "Limite inválido!",
                text: "Informe um limite de alerta válido."
            });
            return;
        }

        if (!dados.data_validade) {
            Swal.fire({
                icon: "warning",
                title: "Data inválida!",
                text: "Informe a data de validade do produto."
            });
            return;
        }

        $.ajax({

            url: "/api/cadastro_produto",
            method: "POST",

            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },

            data: dados,

            success: function (response) {

                if (response.erro === "n") {

                    Swal.fire({
                        icon: "success",
                        title: "Sucesso!",
                        text: "Produto cadastrado com sucesso!"
                    }).then(function () {
                        window.location.href = "/estoque";
                    });

                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Erro!",
                        text: response.mensagem || "Não foi possível cadastrar."
                    });

                }

            },

            error: function (xhr) {

                console.log("Erro:", xhr.responseJSON);

                let mensagem = "Não foi possível cadastrar o produto.";

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    mensagem = Object.values(xhr.responseJSON.errors)
                        .flat()
                        .join("\n");
                }

                Swal.fire({
                    icon: "error",
                    title: "Erro no cadastro!",
                    text: mensagem
                });

            }

        });

    });


    // BOTÃO LIMPAR
    $("#limpar").click(function () {

        $("#formCadastro")[0].reset();

        $("#limite_estoque_baixo").val(5);

    });


    // BOTÃO CANCELAR
    $("#cancelar").click(function () {

        Swal.fire({
            icon: "question",
            title: "Cancelar cadastro?",
            text: "Deseja voltar para a tela de estoque?",
            showCancelButton: true,
            confirmButtonText: "Sim, voltar",
            cancelButtonText: "Continuar cadastrando",
            confirmButtonColor: "#bd3e6b"
        }).then(function (resultado) {

            if (resultado.isConfirmed) {
                window.location.href = "/estoque";
            }

        });

    });

});
