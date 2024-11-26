<?php

require "../conexao.php";

$nome = $_POST['nome'];
$img = $_POST["img"];
$totAulas = $_POST["totAulas"];
$descricao = $_POST["descricao"];
$link = $_POST["link"];

$dir = "uploads/"; 
// recebendo o arquivo multipart 
$img = $_FILES["img"];
// Move o arquivo da pasta temporaria de upload para a pasta de destino 

$nomeImg = "$dir".$img["name"];
if (move_uploaded_file($img["tmp_name"], $nomeImg)) { 
    echo "Arquivo enviado com sucesso!"; 
} 
else { 
    echo "Erro"; 
}    


$sql= "INSERT INTO Curso (nome, img, tot_aulas, descricao, link) VALUE ('$nome', '$nomeImg', '$totAulas', '$descricao', '$link')";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/home.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}