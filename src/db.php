<?php
$conn = new mysqli('localhost', 'jgzoxaxy_jogo', 'grepolis', 'jgzoxaxy_jogo');
if ($conn->connect_error) {
    die('Erro ao conectar ao banco de dados: ' . $conn->connect_error);
    }
    ?>