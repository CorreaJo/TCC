<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Cadastrar Empresa</title>
    <link rel="stylesheet" href="../../frontend/styles/cadastro-empresa.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
</head>
<body>
    <div class="container">
        <h1>Complete os dados a seguir.</h1>
        <form action="cadastro.php" method="post" enctype="multipart/form-data" accept=".png, .jpg, .jpeg">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome">
            <br>
            <label for="cpf">CNPJ:</label><br>
            <input type="text" name="cnpj" id="cnpj">
            <br>
            <label for="tel">Contato:</label><br>
            <input type="text" name="tel" id="telefone">
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
            <input type="file" name="img">
            <label for="senha">Senha:</label>
            <br>
            <input type="password" name="senha">
            <br>
            <input type="hidden" value="empresa" name="categoria">
            <button class="botao">CADASTRAR</button>
        </form>
        <a href="../../frontend/index.php">Voltar para o login</a>
    </div>
</body>
<script>
        $(document).ready(function(){
             $('#telefone').mask('(00) 00000-0000');
             $('#cnpj').mask('00.000.000/0001-00', {reverse: true});
        });
      </script>
</html>