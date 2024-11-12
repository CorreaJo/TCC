<?php

require "../conexao.php";

$link = $_POST['link'];
$id = $_POST["id"];



$sql= "INSERT INTO Curso_aula (link, idCurso) VALUE ('$link', $id)";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/home.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}