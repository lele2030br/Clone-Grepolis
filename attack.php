<?php
require_once '../src/auth.php';
require_once '../src/db.php';
require_once '../src/game.php';

check_login();
$user_id = $_SESSION['user_id'];

$city = $conn->query("SELECT * FROM cities WHERE user_id = $user_id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_city = intval($_POST['target']);
        attack($city['id'], $target_city);
            header('Location: index.php');
                exit;
                }

                // Pega todas as outras cidades
                $cities = $conn->query("SELECT * FROM cities WHERE id != {$city['id']}");
                ?>

                <!DOCTYPE html>
                <html lang="pt-BR">
                <head>
                    <meta charset="UTF-8">
                        <title>Atacar Cidade - Império Antigo</title>
                        </head>
                        <body>
                        <h1>Atacar outra cidade</h1>

                        <form method="post">
                            Escolha uma cidade alvo:<br>
                                <select name="target">
                                        <?php while ($target = $cities->fetch_assoc()): ?>
                                                    <option value="<?= $target['id'] ?>"><?= htmlspecialchars($target['name']) ?></option>
                                                            <?php endwhile; ?>
                                                                </select><br><br>
                                                                    <button type="submit">Atacar</button>
                                                                    </form>

                                                                    <p><a href="index.php">Voltar</a></p>
                                                                    </body>
                                                                    </html>