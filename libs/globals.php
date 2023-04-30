<?php
function corrigirQuebraLinha($text){
    $quebralinha = array("\r\n", "\n");
    return str_replace($quebralinha, '<br />', $text);
}

function corrigirAspas($text){
    $aspas = array("'", '"');
    return str_replace($aspas, "`", $text);
}