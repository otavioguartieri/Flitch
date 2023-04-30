$(document).ready(function () {
    $.ajax({
        url: "modules/chat.php",
        type: "post",
        data: {
            action: 'listar',
            idconversa: '1'
        },
        success: function (resposta) {
            var valor = JSON.parse(resposta);
            if (valor.result) {
                $.each(valor.dados.mensagens, function (chave, value) {
                    $('.message-content').append(`<span>${value.info.mensagem}</span><br>`)
                })
            } else {
                return
            }
        },
    });
})

function enviar() {
    if ($("#message_value").val() == '') {
        return
    }
    $.ajax({
        url: "modules/chat.php",
        type: "post",
        data: {
            action: 'enviar',
            mensagem: $("#message_value").val(),
            idconversa: '1',
            idMensagem: '1'
        },
        success: function (resposta) {
            location.reload();
        },
    });
}