<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Cadastrar Usuario</title>
    <link rel="stylesheet" href="../../frontend/styles/cadastro-usuario.css">
</head>
<body>
    <div class="container">
        <h1>Complete os dados a seguir.</h1>
        <form action="cadastro.php" method="post" enctype="multipart/form-data" accept=".png, .jpg, .jpeg">
            <label for="nome">Nome completo:</label><br>
            <input type="text" name="nome">
            <br>
            <label for="cpf">CPF:</label><br>
            <input type="text" name="cpf">
            <br>
            <label for="tel">Telefone ou Celular:</label><br>
            <input type="text" name="tel">
            <br>
            <label for="cep">CEP:</label><br>
            <input type="text" name="cep">
            <br>
            <label for="rua">Rua:</label><br>
            <input type="text" name="rua">
            <br>
            <label for="numCasa">Número residencial:</label><br>
            <input type="text" name="numCasa">
            <br>
            <label for="bairro">Bairro:</label><br>
            <input type="text" name="bairro">
            <br>
            <label for="pcd">Usuario PCD:</label><br>
            <select name="pcd">
                <option value="sim">Sim</option>
                <option value="nao">Nao</option>
            </select>
            <br>
            <label for="cidade">Cidade:</label><br>
            <input type="text" name="cidade">
            <br>
            <label for="linkedin">Linkedin:</label><br>
            <input type="text" name="linkedin">
            <br>
            <label for="dNasc">Data de Nascimento:</label><br>
            <input type="date" name="dNasc">
            <br>
            <input type="file" name="img">
            <br>
            <label for="email">Email:</label><br>
            <input type="email" name="email">
            <br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha">
            <br>
            <input type="hidden" value="usuario" name="categoria">
            <input type="hidden" value="nao" name="pcd">
            <input type="hidden" value="vazio" name="escolaridade">
            <input type="hidden" value="vazio" name="curriculo">
            <button class="botao">CADASTRAR</button>
        </form>
        <a href="../../frontend/index.php">Voltar para o login</a>
    </div>
</body>
</html>