var partes = location.search.slice(1).split('&');
var url = {};
partes.forEach(function (parte) {
    var chaveValor = parte.split('=');
    var chave = chaveValor[0];
    var valor = chaveValor[1];
    url[chave] = valor;
});
