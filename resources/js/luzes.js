const IP_ESP32 = "http://10.122.42.46";

$(document).ready(function () {

    // ===================================
    // CONTROLE MANUAL DOS LEDS
    // ===================================

    function controlarLuz(rota, mensagemErro) {

        $.ajax({
            url: IP_ESP32 + rota,
            method: "POST",
            timeout: 5000,

            success: function () {
                atualizastatusluzes();
            },

            error: function (xhr, status, error) {
                console.error("Erro:", status, error);
                console.error("Resposta:", xhr.responseText);

                alert(mensagemErro);
            }
        });
    }

    // LED VERMELHO
    $("#ligar_vermelha").click(function () {
        controlarLuz(
            "/led/ligarvermelho",
            "Erro ao ligar a luz vermelha!"
        );
    });

    $("#desligar_vermelha").click(function () {
        controlarLuz(
            "/led/desligarvermelho",
            "Erro ao desligar a luz vermelha!"
        );
    });

    // LED AMARELO
    $("#ligar_amarela").click(function () {
        controlarLuz(
            "/led/ligaramarelo",
            "Erro ao ligar a luz amarela!"
        );
    });

    $("#desligar_amarela").click(function () {
        controlarLuz(
            "/led/desligaramarelo",
            "Erro ao desligar a luz amarela!"
        );
    });

    // LED VERDE
    $("#ligar_verde").click(function () {
        controlarLuz(
            "/led/ligarverde",
            "Erro ao ligar a luz verde!"
        );
    });

    $("#desligar_verde").click(function () {
        controlarLuz(
            "/led/desligarverde",
            "Erro ao desligar a luz verde!"
        );
    });

    // TODOS OS LEDS
    $("#ligar_todos").click(function () {
        controlarLuz(
            "/led/todosligado",
            "Erro ao ligar todos os LEDs!"
        );
    });

    $("#desligar_todos").click(function () {
        controlarLuz(
            "/led/desligartodos",
            "Erro ao desligar todos os LEDs!"
        );
    });

    // CONSULTAR STATUS MANUALMENTE
    $("#status_geral").click(function () {
        atualizastatusluzes();
    });

    // ===================================
    // INICIALIZACAO
    // ===================================

    atualizastatusluzes();

    // Atualiza os LEDs conforme o estoque
    atualizarLuzPeloEstoque();

    // Consulta o estoque a cada 5 segundos
    setInterval(function () {
        atualizarLuzPeloEstoque();
    }, 5000);

});


// ===================================
// CONSULTAR STATUS DOS LEDS NO ESP32
// ===================================

function atualizastatusluzes() {

    $.ajax({
        url: IP_ESP32 + "/led/statusgeral",
        method: "GET",
        dataType: "json",
        timeout: 5000,

        success: function (response) {

            // VERMELHO
            if (response.vermelho === "Ligado") {
                $("#status_vermelha_ligado").show();
                $("#status_vermelha_desligado").hide();
            } else {
                $("#status_vermelha_ligado").hide();
                $("#status_vermelha_desligado").show();
            }

            // AMARELO
            if (response.amarelo === "Ligado") {
                $("#status_amarela_ligado").show();
                $("#status_amarela_desligado").hide();
            } else {
                $("#status_amarela_ligado").hide();
                $("#status_amarela_desligado").show();
            }

            // VERDE
            if (response.verde === "Ligado") {
                $("#status_verde_ligado").show();
                $("#status_verde_desligado").hide();
            } else {
                $("#status_verde_ligado").hide();
                $("#status_verde_desligado").show();
            }

        },

        error: function (xhr, status, error) {
            console.error("Erro ao consultar status dos LEDs:", error);
        }
    });

}


// ===================================
// ATUALIZAR LED CONFORME O ESTOQUE
// ===================================

function atualizarLuzPeloEstoque() {

    $.ajax({
        url: "/api/estoque/status-iot",
        method: "GET",
        dataType: "json",
        timeout: 5000,

        success: function (response) {

            let rota;

            // Identifica a situação do estoque
            if (response.status === "vermelho") {

                rota = "/led/ligarvermelho";

            } else if (response.status === "amarelo") {

                rota = "/led/ligaramarelo";

            } else if (response.status === "verde") {

                rota = "/led/ligarverde";

            } else {

                console.error("Status de estoque desconhecido:", response.status);
                return;

            }

            // Primeiro desliga todos os LEDs
            $.ajax({
                url: IP_ESP32 + "/led/desligartodos",
                method: "POST",
                timeout: 5000,

                success: function () {

                    // Depois liga somente o LED correspondente
                    $.ajax({
                        url: IP_ESP32 + rota,
                        method: "POST",
                        timeout: 5000,

                        success: function () {

                            console.log(
                                "Status do estoque:",
                                response.status
                            );

                            atualizastatusluzes();

                        },

                        error: function (xhr) {
                            console.error(
                                "Erro ao acender o LED:",
                                xhr.responseText
                            );
                        }
                    });

                },

                error: function (xhr) {
                    console.error(
                        "Erro ao desligar os LEDs:",
                        xhr.responseText
                    );
                }
            });

        },

        error: function (xhr, status, error) {
            console.error(
                "Erro ao consultar o estoque:",
                status,
                error
            );
        }
    });

}
