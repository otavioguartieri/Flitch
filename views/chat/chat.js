$(document).ready(function () {
    $.post("modules/chat.php",{
        action: 'listar',
        idconversa: url['id']}, 
    function(data){
        if (data.result < 0) return;
        $('.message-content').html('');
        $.each(data.data, function (index, item) {
            $('.message-content').append(`<span class="message_box" id="${item.id}">${item.message}</span><br>`);
        })
    });
});

function send() {
    if ($("#message_value").val().trim() == '') return;
    $.post("modules/chat.php",{
        action: 'send',
        mensagem: $("#message_value").val(),
        idconversa:  url['id'],
        idMensagem: $('.message_box').length+1
    },
    function(data){
        if (data.result < 0) return;
        $('.message-content').html('');
        $.each(data.data, function (index, item) {
            $('.message-content').append(`<span>${item.message}</span><br>`);
        })
    });
}