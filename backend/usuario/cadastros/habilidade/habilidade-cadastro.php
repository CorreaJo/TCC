<?php

require "../../../conexao.php";

$nome = $_POST['nome'];
$empresa = $_POST["empresa"];
$carga = $_POST["carga"];
$id = $_POST["id"];

$sql= "INSERT INTO habilidade (nome, empresa, cargaHoraria, idUsuario) VALUE ('$nome', '$empresa', '$carga', '$id')";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../../../frontend/cadastros-extra.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}
 