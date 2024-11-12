<?php

require "../conexao.php";

$nome = $_POST['nome'];
$img = $_POST["img"];

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


$sql= "INSERT INTO Medalha (nome, img) VALUE ('$nome', '$nomeImg')";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/home.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}