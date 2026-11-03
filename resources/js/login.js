$(document).ready(function() {

    $("#entrar").click(function() {

        $.ajax({
            url: "api/login",
            method: "POST",
            data: {
                email: $("#email").val(),
                senha: $("#senha").val()
            },
            success: function(response) {
                console.log(response);
                if (response['erro'] == 'n') {
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Login realizado com sucesso!'

                         }).then(() => {
                        window.location.href = "/estoque";
                    });

                   // alert("Token: " + response['token']);

                    $.cookie('token_usuario', response['token'], { expires:7, path: '/' });

                setTimeout(function() {
                    
                window.location.href = "/estoque";
                
                }, 2000);
                
            } else {
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