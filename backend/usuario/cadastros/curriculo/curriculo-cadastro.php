<?php
session_start();    
require "../../../conexao.php";

$arquivo = $_FILES['file'];
$nome = $arquivo['name'];

$ext = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
$nome = md5(uniqid(rand(), true)) . ".{$ext}";
$nomeLocal = __DIR__ . "/upload/$nome";

move_uploaded_file($arquivo['tmp_name'], $nomeLocal);

$id = $_POST['id'];

$sql= "UPDATE Usuario SET curriculo = '$nome' WHERE id = '$id'";
$result= mysqli_query($conexao, $sql);

if($result) {
    $_SESSION["curriculo"] = $nome;
    header('Location: ../../../../frontend/cadastros-extra.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}

?>