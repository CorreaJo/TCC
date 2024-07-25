<?php
function conexao(){
    $conexao = mysqli_connect("localhost", "root", "", "cordwork");

    if(!$conexao) {
        die("Conexão falhou: ". mysqli_connect_error());
    }
    return $conexao;
}

?>