<?php

require "../conexao.php";

$id = $_GET["id"];

$sql= "DELETE FROM Vaga WHERE id='$id'";
$result= mysqli_query($conexao, $sql);


if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}