<?php

require "../conexao.php";

$link = $_POST['link'];
$title = $_POST['title'];
$id = $_POST["id"];



$sql= "INSERT INTO Curso_aula (link, titulo, idCurso) VALUE ('$link', '$title', $id)";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/home.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}