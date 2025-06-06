<?php

require_once 'Mensagem.php';

$mensagem = new Mensagem($_POST['destiny'], $_POST['title'], $_POST['message']);

if($mensagem->mensagemValida()){
    echo 'Mensagem válida!';
}else{
    header('Location: index.php?erro=valid');
}