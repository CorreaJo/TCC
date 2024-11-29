<?php

// hospedagem - mysql -hjunction.proxy.rlwy.net -uroot -pZddpHMlcQLwfNZVGQxZZkaFZZfqpttjO --port 44901 --protocol=TCP railway
$conexaoHosp = mysqli_connect("mysql.railway.internal", "root", "ZddpHMlcQLwfNZVGQxZZkaFZZfqpttjO", "cordwork");
$conexao = mysqli_connect("localhost", "root", "", "cordwork");
if(!$conexaoHosp) {
    echo "Erro de conexão com o banco de dados!";
    echo mysqli_connect_error();
}