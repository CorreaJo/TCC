<?php
session_start();
require "../backend/conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Sobre Nós</title>
    <link rel="stylesheet" href="styles/sobre-nos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php require "componente/cabecalho.php"?>
    <main>
        <div class="main">
        <h1>SOBRE NÓS</h1>
        <p>Nós somos uma dupla de alunos do Instituto Federal de Itapetininga e por meio deste projeto temos o objetivo de enfrentar um dos grandes desafios da sociedade atual: o desemprego. Entendemos que, em um mercado de trabalho em constante transformação, é fundamental que as pessoas tenham acesso a ferramentas que lhes permitam desenvolver novas habilidades e encontrar oportunidades de emprego. Por isso, desenvolvemos um site voltado para a oferta de cursos de qualificação profissional e vagas de trabalho.</p>
        <p>Nosso TCC visa não apenas discutir o impacto do desemprego, mas também apresentar uma solução prática e inovadora para amenizar esse problema. O site que projetamos será uma plataforma acessível, onde indivíduos poderão se inscrever em cursos gratuitos, além de terem acesso a vagas de emprego compatíveis com suas habilidades.</p>
        <p>Acreditamos que, ao facilitar o acesso à educação e ao mercado de trabalho, podemos contribuir para a inclusão social e o crescimento profissional de muitas pessoas, criando um impacto positivo na sociedade. Estamos comprometidos em oferecer uma solução que conecte aprendizado e oportunidades, ajudando a reduzir o desemprego e a promover o desenvolvimento econômico e social.</p>
        <img src="img/logo-int.png" alt="logo inteira cordwork">
        </div>
    </main>
    <footer>
        <div class="rodape">
            <div class="footer-title">
                <h3>INFOS</h3>
            </div>
            <ol>
                <li><a href="#">VAGAS</a></li>
                <li><a href="#">CURSOS</a></li>
                <li><a href="sobre-nos.html">SOBRE NÓS</a></li>
                <li><a href="#">PORTAL DO CANDIDATO</a></li>
                <li><a href="#">PORTAL DA EMPRESA</a></li>
            </ol>
            <div class="sub-footer">
                <p>© 2024 Copyright - CordWork</p>
            </div>    
        </div>
    </footer>
    <script>
        function clickMenu () {
            if (menu.style.display == 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }
    </script>
</body>
</html>