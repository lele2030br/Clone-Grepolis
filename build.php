<?php
require_once '../src/auth.php';
require_once '../src/db.php';
require_once '../src/game.php';

check_login();
$user_id = $_SESSION['user_id'];

$city = $conn->query("SELECT * FROM cities WHERE user_id = $user_id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $building = $_POST['building'];
        build($city['id'], $building);
            header('Location: index.php');
                exit;
                }
                ?>

                <!DOCTYPE html>
                <html lang="pt-BR">
                <head>
                    <meta charset="UTF-8">
                        <title>Construir - Império Antigo</title>
                        </head>
                        <body>
                        <h1>Construir</h1>

                        <form method="post">
                            Escolha um edifício:<br>
                                <select name="building">
                                        <option value="Serraria">Serraria (Madeira)</option>
                                                <option value="Pedreira">Pedreira (Pedra)</option>
                                                        <option value="Mina de Prata">Mina de Prata (Prata)</option>
                                                            </select><br><br>
                                                                <button type="submit">Construir</button>
                                                                </form>

                                                                <p><a href="index.php">Voltar</a></p>
                                                                </body>
                                                                </html>