<?php
session_start();
require "../../../conexao.php";

$id = $_SESSION['id'];
$caminho_antigo = $_SESSION['curriculo'];
$vazio = "vazio";

$sql= "UPDATE Usuario SET curriculo = 'vazio' WHERE id = '$id'";
$result= mysqli_query($conexao, $sql);

if($result) {
    unlink('upload/'.$caminho_antigo);
    $_SESSION["curriculo"] = $vazio;
    header('Location: ../../../../frontend/cadastros-extra.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}

?>