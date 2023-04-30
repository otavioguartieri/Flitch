<?php
include_once("../libs/globals.php");

if ($_REQUEST['action']){
    switch(($_REQUEST['action'] ?? '')){
        case 'enviar':
            $response = $conn->query("SELECT dados FROM chat WHERE `id` = '" . $_REQUEST['idconversa'] . "'");
            if ($conn->affected_rows > 0) {
                $row = $response->fetch_array(MYSQLI_NUM);
                $mensagemArray = json_decode($row[0], true);

                $mensagemArrayNew['id'] = $_REQUEST['idMensagem'] .'_'. rand(0, 9) . strtotime('now');
                $mensagemArrayNew['info']['created'] = strtotime(date('Y-m-d H:i:s'));
                $mensagemArrayNew['info']['type'] = ($_REQUEST['type'] ?? 'texto');
                $mensagemArrayNew['info']['message'] = corrigirQuebraLinha(corrigirAspas($_REQUEST['mensagem']));
                $mensagemArrayNew['info']['visualized'] = 'n';

                array_push($mensagemArray['mensagens'], $mensagemArrayNew);
                $jsonDados = json_encode($mensagemArray);

                $response = $conn->query("UPDATE chat SET `dados` = '$jsonDados' WHERE `id` = '" . $_REQUEST['idconversa'] . "'");
            }
        break;
    } 
    $getresponse = $conn->query("SELECT dados FROM chat WHERE `id` = '" . $_REQUEST['idconversa'] . "'");
    if ($conn->affected_rows > 0) {
        $row = $getresponse->fetch_array(MYSQLI_NUM);
        exit(json_encode([
            'data' => json_decode($row[0], true),
            'result'=>'1',
            'header'=>header('Content-Type: application/json')
        ]));
    }else{
        exit(json_encode([
            'data' => [],
            'result'=>'-1',
            'header'=>header('Content-Type: application/json')
        ]));
    }
}
