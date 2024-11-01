<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Cadastrar Empresa</title>
    <link rel="stylesheet" href="../../frontend/styles/cadastro-empresa.css">
</head>
<body>
    <div class="container">
        <h1>Complete os dados a seguir.</h1>
        <form action="cadastro.php" method="post">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome">
            <br>
            <label for="cpf">CNPJ:</label><br>
            <input type="text" name="cnpj">
            <br>
            <label for="tel">Contato:</label><br>
            <input type="text" name="tel">
            <br>
            <label for="cidade">Cidade:</label><br>
            <input type="text" name="cidade">
            <br>
            <label for="linkedin">Linkedin:</label><br>
            <input type="text" name="linkedin">
            <br>
            <label for="email">Email:</label><br>
            <input type="email" name="email">
            <br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha">
            <br>
            <input type="hidden" value="empresa" name="categoria">
            <button class="botao">CADASTRAR</button>
        </form>
        <a href="../../frontend/index.php">Voltar para o login</a>
    </div>
</body>
</html>