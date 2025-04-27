<?php
require_once '../src/auth.php';
require_once '../src/db.php';
require_once '../src/game.php';

check_login();
$user_id = $_SESSION['user_id'];

$city = $conn->query("SELECT * FROM cities WHERE user_id = $user_id")->fetch_assoc();

produce_resources($city['id']); // Gera recursos ao visitar
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
        <title>Império Antigo</title>
            <link rel="stylesheet" href="css/style.css">
            </head>
            <body>
            <h1><?= htmlspecialchars($city['name']) ?></h1>
            <p>Madeira: <?= $city['wood'] ?> | Pedra: <?= $city['stone'] ?> | Prata: <?= $city['silver'] ?></p>

            <nav>
                <a href="build.php">Construir</a> | 
                    <a href="train.php">Treinar Tropas</a> | 
                        <a href="attack.php">Atacar</a> | 
                            <a href="logout.php">Sair</a>
                            </nav>
                            </body>
                            </html>