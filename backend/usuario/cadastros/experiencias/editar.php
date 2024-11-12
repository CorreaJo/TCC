<?php

require "../../../conexao.php";

$funcao = $_POST["funcao"];
$empresa = $_POST["empresa"];
$carga = $_POST["carga"];
$id = $_POST["id"];

$sql= "UPDATE experiencia SET funcao = '$funcao', empresa = '$empresa', periodo = '$carga' WHERE id = '$id'";

$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../../../frontend/cadastros-extra.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}