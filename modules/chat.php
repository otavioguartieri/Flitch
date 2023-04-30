<?php
date_default_timezone_set('America/Sao_Paulo');
include_once("../db/conexao.php");
include_once("../libs/globals.php");
if ($_REQUEST['action']) {
    if ($_REQUEST['action'] == 'listar') {
        $resposta = $conn->query("SELECT conversa FROM chat WHERE `id` = '" . $_REQUEST['idconversa'] . "'");
        if ($conn->affected_rows > 0) {
            $row = $resposta->fetch_array(MYSQLI_NUM);
            echo json_encode(['result' => true, 'dados' => json_decode($row[0], true)]);
        }else{
            echo json_encode(['result' => false]);
        }
        exit();
    }

    if ($_REQUEST['action'] == 'enviar') {
        $dados = ['idConversa' => $_REQUEST['idconversa'], 'idMensagem' => $_REQUEST['idMensagem'] .'_'. rand(0, 9) . strtotime(date('Y-m-d H:i:s')), 'tipo' => 'texto', 'mensagem' => $_REQUEST['mensagem'], 'visualizacao' => 'nao'];
        $resposta = insertMensagem($dados, $conn);
    }
} else {
}

function insertMensagem($dados, $conn)
{
    $resposta = $conn->query("SELECT conversa FROM chat WHERE `id` = '" . $dados['idConversa'] . "'");
    if ($conn->affected_rows > 0) {
        $row = $resposta->fetch_array(MYSQLI_NUM);
        $mensagemArray = json_decode($row[0], true);
        $mensagemArrayNew['id'] = $dados['idMensagem'];
        $mensagemArrayNew['info']['horario'] = strtotime(date('Y-m-d H:i:s'));
        $mensagemArrayNew['info']['tipo'] = $dados['tipo'];
        $mensagem = corrigirQuebraLinha(corrigirAspas($dados['mensagem']));
        $mensagemArrayNew['info']['mensagem'] = $mensagem;
        $mensagemArrayNew['info']['visualizacao'] = $dados['visualizacao'];
        array_push($mensagemArray['mensagens'], $mensagemArrayNew);
        $jsonDados = json_encode($mensagemArray);
        $resposta = $conn->query("UPDATE chat SET `conversa` = '$jsonDados' WHERE `id` = '" . $dados['idConversa'] . "'");
    }
    return $resposta;
}
