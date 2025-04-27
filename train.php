<?php
require_once '../src/auth.php';
require_once '../src/db.php';
require_once '../src/game.php';

check_login();
$user_id = $_SESSION['user_id'];

$city = $conn->query("SELECT * FROM cities WHERE user_id = $user_id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $troop_type = $_POST['troop'];
        $quantity = intval($_POST['quantity']);
            train_troops($city['id'], $troop_type, $quantity);
                header('Location: index.php');
                    exit;
                    }
                    ?>

                    <!DOCTYPE html>
                    <html lang="pt-BR">
                    <head>
                        <meta charset="UTF-8">
                            <title>Treinar Tropas - Império Antigo</title>
                            </head>
                            <body>
                            <h1>Treinar Tropas</h1>

                            <form method="post">
                                Tipo de tropa:<br>
                                    <select name="troop">
                                            <option value="Espadachim">Espadachim</option>
                                                    <option value="Arqueiro">Arqueiro</option>
                                                            <option value="Cavalaria">Cavalaria</option>
                                                                </select><br><br>
                                                                    Quantidade:<br>
                                                                        <input type="number" name="quantity" min="1" required><br><br>
                                                                            <button type="submit">Treinar</button>
                                                                            </form>

                                                                            <p><a href="index.php">Voltar</a></p>
                                                                            </body>
                                                                            </html>