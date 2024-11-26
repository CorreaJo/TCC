<?php

require "../conexao.php";

$nome = $_POST['nome'];
$cnpj = $_POST["cnpj"];
$telefone = $_POST["tel"];
$cidade = $_POST["cidade"];
$linkedin = $_POST["linkedin"];
$email = $_POST["email"];
$categoria = $_POST["categoria"];

$hashSenha =  base64_encode($_POST["senha"]);

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

$sql= "INSERT INTO empresa (nome, img, senha, email, cnpj, telefone, cidade, linkedin, categoria) VALUE ('$nome', '$nomeImg', '$hashSenha', '$email', '$cnpj', '$telefone', '$cidade', '$linkedin', '$categoria')";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}